// Call the function initially when the page loads
updateNotificationDropdown();

// Set up a timer to call the function every, for example, 5 seconds
setInterval(updateNotificationDropdown, 50000); // Adjust the interval as needed

function updateNotificationDropdown() {
    $.ajax({
        url: '/getNofification',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Update the dropdown menu with the new incidents data
            // You can use jQuery or vanilla JavaScript to manipulate the DOM
            // Example (using jQuery):
            
            var counterData = data.count;

            var dropdown = $('#notificationDropdown .scroll');
            var counter = $('#notificationcount');
                dropdown.empty();
                counter.empty();
                var i=0;
                data.forEach(function (incidents) {
                    i++;
                    //console.log(incidents.count); // Log the data to the console
                    var branchName = incidents.branch.name;
                    var touchpointOptionName = incidents.touchpoint_option.options;
                    var CreateddAt = new Date(incidents.created_at);
                var formattedDate = `${CreateddAt.getFullYear()}-${padZero((CreateddAt.getMonth() + 1))}-${padZero(CreateddAt.getDate())} ${padZero(CreateddAt.getHours())}:${padZero(CreateddAt.getMinutes())}`;

                        var counterS = counterData;
                    var notificationItem = `
                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="${incidents.response_image}" alt="Notification Image"
                                    class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">${touchpointOptionName} - ${branchName}</p>
                                    <p class="text-muted mb-0 text-small">${formattedDate}</p>
                                </a>
                            </div>
                        </div>
                    `;
                    dropdown.append(notificationItem);
                    
                });
                counter.append(i);
            },
            error: function (error) {
                console.error('Error fetching complaint data: ' + error);
            }
        });
    }

    function padZero(number) {
        return (number < 10) ? '0' + number : number;
    }

    // Call the function initially when the page loads
    updateNotificationDropdown();

    // Set up a timer to call the function every, for example, 5 seconds
    setInterval(updateNotificationDropdown, 5000); // Adjust the interval as needed

    // Close the scroll div when reaching the end
    var scrollDiv = $('#notificationDropdown .scroll');
    scrollDiv.on('scroll', function() {
        if (scrollDiv[0].scrollHeight - scrollDiv.scrollTop() === scrollDiv.outerHeight()) {
            // Scrolled to the bottom
            // You can add logic here to handle the end of data
            console.log('End of data reached');
        }
    });
