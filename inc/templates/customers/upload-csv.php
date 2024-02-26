<div class="file-uploader">
    <input type="file" id="csvFile" accept=".csv">
	<label for="csvFile" class="custom-file-upload">
        <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_4635_40382)">
                <path d="M20.8337 33.4951H29.167C30.3128 33.4951 31.2503 32.5576 31.2503 31.4118V20.9951H34.5628C36.417 20.9951 37.3545 18.7451 36.042 17.4326L26.4795 7.87012C25.667 7.05762 24.3545 7.05762 23.542 7.87012L13.9795 17.4326C12.667 18.7451 13.5837 20.9951 15.4378 20.9951H18.7503V31.4118C18.7503 32.5576 19.6878 33.4951 20.8337 33.4951ZM12.5003 37.6618H37.5003C38.6462 37.6618 39.5837 38.5993 39.5837 39.7451C39.5837 40.891 38.6462 41.8285 37.5003 41.8285H12.5003C11.3545 41.8285 10.417 40.891 10.417 39.7451C10.417 38.5993 11.3545 37.6618 12.5003 37.6618Z" fill="#7A7A9D"/>
            </g>
            <defs>
                <clipPath id="clip0_4635_40382">
                <rect width="50" height="50" fill="white" transform="translate(0 0.162109)"/>
                </clipPath>
            </defs>
        </svg> 
        <p class="caption mb-0">Once CSV is populated</p>
		<h4 class="mb-0">Upload Customers CSV</h4>
	</label>
</div>



<div id="csvData" class="csv-upload-popup"> 
    <span class="overlay"></span>
    <div class="popup-container">
        <div class="pop-header">
            <h3>Does this look right?</h3>
            <div class="close-popup">
                Close 
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.808058 0.808058C1.05214 0.563981 1.44786 0.563981 1.69194 0.808058L5 4.11612L8.30806 0.808058C8.55214 0.563981 8.94786 0.563981 9.19194 0.808058C9.43602 1.05214 9.43602 1.44786 9.19194 1.69194L5.88388 5L9.19194 8.30806C9.43602 8.55214 9.43602 8.94786 9.19194 9.19194C8.94786 9.43602 8.55214 9.43602 8.30806 9.19194L5 5.88388L1.69194 9.19194C1.44786 9.43602 1.05214 9.43602 0.808058 9.19194C0.563981 8.94786 0.563981 8.55214 0.808058 8.30806L4.11612 5L0.808058 1.69194C0.563981 1.44786 0.563981 1.05214 0.808058 0.808058Z" fill="#7A7A9D"/> 
                </svg> 
            </div>
        </div>
        <div class="csv-table" ></div>
        <button disabled >Add</button>
    </div>
</div>

