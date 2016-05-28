<?php

/**
 * Class CurlSearch
 */
class CurlSearch
{
    /**
     * URL for search request
     * @var string
     */
    protected $url = "https://dev.binaryuno.com/services/services.php";

    /**
     * Concatenated search parameters
     * @var string
     */
    protected $searchParams;

    /**
     * @var string
     */
    protected $filter;

    /**
     * @var bool|string
     */
    protected $filtervalue = false;

    /**
     * CurlSearch constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->prepareParams($data);
    }

    /**
     * Prepare parameters for search via cURL
     * @param $data
     */
    protected function prepareParams($data)
    {
        $parameters = array();
        foreach ($data as $key => $value) {
            $parameters[] = $key . "=" . $value;
        }

        $this->searchParams = implode("&", $parameters);
        $this->filter = $data['filter'];

        switch ($this->filter) {
            case "email":
                $this->filtervalue = $data['filtervalue'];
                break;
            case "id":
                // needle for search by ID can be here
                break;
        }
    }

    /**
     * General search function
     * @return string
     */
    public function search()
    {
        $result = $this->getData();

        if (($result['errno'] != 0) || ($result['header']['http_code'] != 200)) {
            return $result['errmsg'] . 'error';
        } else {
            $result = $this->findMatches($result['content']);

            return $result;
        }


    }

    /**
     * Looking for matches in search results according to specified parameters
     * @param string $data
     * @return string
     */
    protected function findMatches($data)
    {
        switch ($this->filter) {
            case "email":
                if (preg_match("/\b$this->filtervalue\b/i", $data)) {
                    return "<p class='bg-success'>Email address <strong>{$this->filtervalue}</strong> exists in database! <strong>:)</strong></p>";
                } else {
                    return "<p class='bg-danger'>Email address <strong>{$this->filtervalue}</strong> doesn't exists in database! <strong>:(</strong></p>";
                }
                break;
            case "id":
                // preg_match for ID can be here
                return $data;
                break;
        }
    }

    /**
     * Makes a request using cURL according to specified parameters
     * @return array
     */
    protected function getData()
    {
        $result = array();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable  
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // times out after 10s
        curl_setopt($ch, CURLOPT_POST, 1); // set POST method  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->searchParams); // add POST fields

        $result['content'] = curl_exec($ch); // run the whole process

        $result['errno'] = curl_errno($ch);
        $result['errmsg'] = curl_error($ch);
        $result['header'] = curl_getinfo($ch);

        curl_close($ch);

        return $result;
    }

}