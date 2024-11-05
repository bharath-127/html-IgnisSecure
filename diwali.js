document.addEventListener('DOMContentLoaded', function () {
    // Handle License Application Form Submission
    const applyForm = document.querySelector('#applyForm');
    applyForm.addEventListener('submit', function (event) {
        event.preventDefault();  // Prevent the form from refreshing the page

        // Capture input values
        const businessName = document.querySelector('#business_name').value;
        const ownerName = document.querySelector('#owner_name').value;
        const location = document.querySelector('#location').value;

        // Simulate a submission result
        const result = document.querySelector('#applicationResult');
        result.innerHTML = `<p>Application submitted successfully!<br>Business Name: ${businessName}<br>Owner Name: ${ownerName}<br>Location: ${location}</p>`;
        result.style.color = "green";  // Make the text green for success
    });

    // Handle License Tracking Form Submission
    const trackForm = document.querySelector('#trackForm');
    trackForm.addEventListener('submit', function (event) {
        event.preventDefault();  // Prevent the form from refreshing the page

        // Capture input values
        const licenseNumber = document.querySelector('#license_number').value;

        // Simulate tracking result
        const result = document.querySelector('#trackingResult');
        result.innerHTML = `<p>Tracking License: ${licenseNumber}<br>Status: Approved</p>`;
        result.style.color = "blue";  // Make the text blue for tracking info
    });

    // Handle License Renewal Form Submission
    const renewForm = document.querySelector('#renewForm');
    renewForm.addEventListener('submit', function (event) {
        event.preventDefault();  // Prevent the form from refreshing the page

        // Capture input values
        const licenseNumberRenew = document.querySelector('#license_number_renew').value;

        // Simulate renewal result
        const result = document.querySelector('#renewalResult');
        result.innerHTML = `<p>License ${licenseNumberRenew} has been renewed successfully!</p>`;
        result.style.color = "green";  // Green text for success
    });
});
