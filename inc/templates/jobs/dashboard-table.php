<form id="" class="table-filters" >
    <label for="">
        <input class="search" type="text" value="" >
    </label>
    <select name="job-status" >
        <option value="complete">Complete</option>
        <option value="draft">Draft</option>
        <option value="pending">Pending</option>
    </select>
    <select name="date-range" >
        <option value="7">Last 7 Days</option>
        <option value="14">Last 14 Days</option>
        <option value="21">Last 21 Days</option>
    </select>
    <div>
        <label for="hide-customer">
            Customer
            <input checked="true" type="checkbox" id="hide-customer" name="hide-customer" >
        </label>
        <label for="hide-date">
            Date
            <input checked="true" type="checkbox" id="hide-date" name="hide-date" >
        </label>
        <label for="hide-jobno">
            Job No.
            <input checked="true" type="checkbox" id="hide-jobno" name="hide-jobno" >
        </label>
        <label for="hide-vehicle" >
            Vehicle
            <input checked="true" type="checkbox" id="hide-vehicle" name="hide-vehicle" >
        </label>
        <label for="hide-registration" >
            Registration
            <input checked="true" type="checkbox" id="hide-registration" name="hide-registration" >
        </label>
        <label for="hide-status" >
            Status
            <input checked="true" type="checkbox" id="hide-status" name="hide-status" >
        </label>
        <label for="hide-notes" >
            Notes
            <input checked="true" type="checkbox" id="hide-notes" name="hide-notes" >
        </label>
        <label for="hide-total" >
            Total
            <input checked="true" type="checkbox" id="hide-total" name="hide-total" >
        </label>
    </div>
</form>

<table id="jobs-table" >
    <thead>
        <tr>
            <th>Customer</th>
            <th>Date</th>
            <th>Job No.</th>
            <th>Vehicle</th>
            <th>Registration</th>
            <th>Status</th>
            <th>Notes</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
    </thead>
    <body>
    
    </body>
</table>
