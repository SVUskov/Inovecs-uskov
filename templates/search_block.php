<form id="search-form" class="form-horizontal main-blocks-wrapper" role="form" onsubmit="return false">

    <!--             Module -->
    <div class="form-group">
        <label for="module" class="col-sm-2 control-label">Module</label>
        <div class="col-sm-10">
            <select id="module" class="form-control" name="module">
                <option value="Customer">Customer</option>
            </select>
        </div>
    </div>

    <!--             Action -->
    <div class="form-group">
        <label for="command" class="col-sm-2 control-label">Action</label>
        <div class="col-sm-10">
            <select id="command" class="form-control" name="command">
                <option value="view">View</option>
            </select>
        </div>
    </div>

    <!--             Filter -->
    <div class="form-group">
        <label for="filter" class="col-sm-2 control-label">Filter by</label>
        <div class="col-sm-10">
            <select id="filter" class="form-control" name="filter">
                <option selected="" value="id">ID</option>
                <option value="email">Email</option>
            </select>
        </div>
    </div>

    <!--             Filter value -->
    <div id="email-address-block" class="form-group">
        <label for="filter-value" class="col-sm-2 control-label">Filter value</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="filter-value" placeholder="enter ID number">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <span class="btn btn-primary send-request">Search</span>
        </div>
    </div>
</form>

