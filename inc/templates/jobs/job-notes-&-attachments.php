<form id="notes-attachment-fields" >
    <div class="form-row" >
        <div class="d-flex flex-column fw-100" >
            <p>Job notes</p>
            <div class="fw-100 pr-2" >
                <label for="job-notes" ></label>
                <textarea type="text" id="job-notes" name="job-notes" > </textarea>
            </div>
        </div>
    </div>
    <div class="form-row attachments" >
        <div class="d-flex flex-column fw-100" >
            <p>Attachments</p>
            <div class="fw-100" >
                <label for="attachment" >
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5072 1.67727C6.6397 0.70057 8.21698 0 10 0C13.3628 0 16.1541 2.4993 16.4571 5.72373C18.4476 6.00513 20 7.6707 20 9.71591C20 11.9619 18.1279 13.75 15.8594 13.75H12.5C12.1548 13.75 11.875 13.4702 11.875 13.125C11.875 12.7798 12.1548 12.5 12.5 12.5H15.8594C17.4741 12.5 18.75 11.2355 18.75 9.71591C18.75 8.19629 17.4741 6.93182 15.8594 6.93182H15.2344V6.30682C15.2344 3.532 12.9091 1.25 10 1.25C8.54697 1.25 7.25316 1.82216 6.32358 2.62386C5.37788 3.43946 4.88281 4.42287 4.88281 5.19318V5.75325L4.3261 5.81444C2.57964 6.0064 1.25 7.44082 1.25 9.14773C1.25 10.9811 2.78824 12.5 4.72656 12.5H7.5C7.84518 12.5 8.125 12.7798 8.125 13.125C8.125 13.4702 7.84518 13.75 7.5 13.75H4.72656C2.13442 13.75 0 11.7075 0 9.14773C0 6.94389 1.58233 5.1189 3.67778 4.65625C3.85599 3.57713 4.54981 2.50296 5.5072 1.67727Z" fill="#7A7A9D"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55806 5.18306C9.80214 4.93898 10.1979 4.93898 10.4419 5.18306L14.1919 8.93306C14.436 9.17714 14.436 9.57286 14.1919 9.81694C13.9479 10.061 13.5521 10.061 13.3081 9.81694L10.625 7.13388V18.125C10.625 18.4702 10.3452 18.75 10 18.75C9.65482 18.75 9.375 18.4702 9.375 18.125V7.13388L6.69194 9.81694C6.44786 10.061 6.05214 10.061 5.80806 9.81694C5.56398 9.57286 5.56398 9.17714 5.80806 8.93306L9.55806 5.18306Z" fill="#7A7A9D"/>
                    </svg>
                    <p class="upload-title mb-0 small-text" >Upload attachments</p>
                    <p class="mb-0 extra-small-text" >Formats: Jpg, Png, Pdf, Word, Excel</p>
                    <p class="mb-0 extra-small-text" >Max size: 4Mb</p>
                </label>
                <input type="file" id="attachment" accept=".jpg,.png,.pdf" class="d-none" >                
            </div>
        </div>
    </div>
</form>
<table id="attachment-files" >
    <thead><tr><th>Name</th><th>Delete</th></tr></thead>
    <tbody>
    </tbody>
</table>