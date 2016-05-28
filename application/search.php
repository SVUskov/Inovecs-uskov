<?php

spl_autoload_register(function ($class_name) {
    require_once $class_name . ".php";
});

$validator = new Validator();

if ($_POST['filter'] === 'email') {
    $validator->set_rules('filtervalue', 'Значение фильтра',
        array(
            'required' => "You need to specify email address if selected filter is 'Email'!",
            'valid_email' => "Please, specify correct email address!",
        )
    );
} else {
    $validator->set_rules('filtervalue', 'Значение фильтра',
        array(
            'required' => "You need to specify ID if selected filter is 'ID'!",
            'integer' => "ID should be a number!",
        )
    );
}

$noErrors = $validator->run();

if (!$noErrors) {
    foreach ($validator->get_array_errors() as $error) {
        echo '<p class="bg-danger">' . $error . '</p>';
    }
    return;
}

$search = new CurlSearch($_POST);
$result = $search->search();

echo $result;