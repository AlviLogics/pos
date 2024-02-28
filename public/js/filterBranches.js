$(document).ready(function() {
    // Event listener for changes in dropdowns
    $('#brand_id, #country_id, #state_id, #city_id, #area_id').change(function() {
        // Get selected values
        var brandId = $('#brand_id').val();
        var countryId = $('#country_id').val();
        var stateId = $('#state_id').val();
        var cityId = $('#city_id').val();
        var areaId = $('#area_id').val();

        // Send AJAX request to get filtered branches count
        $.ajax({
            type: 'GET',
            url: '/getBranchesCount',
            data: {
                brand_id: brandId,
                country_id: countryId,
                state_id: stateId,
                city_id: cityId,
                area_id: areaId,
            },
            success: function(data) {
                // Update the page with the filtered branches count
                $('#filteredBranchesCountContainer').html(data.count);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

        // Send AJAX request to get branches with complaints count
        $.ajax({
            type: 'GET',
            url: '/getBranchesWithComplaintsCount',
            data: {
                brand_id: brandId,
                country_id: countryId,
                state_id: stateId,
                city_id: cityId,
                area_id: areaId,
            },
            success: function(data) {
                // Update the page with the branches with complaints count
                $('#branchesWithComplaintsCountContainer').html(data.count);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

                
        
        // Sample AJAX call
        $.ajax({
            type: 'GET',
            url: '/update-graph-branches',
            data: {
                brand_id: brandId,
            },
            success: function(data) {
                // Update variables
                //updateVariables(data);


                // Use the updated variables as needed
                console.log(surveys, tickets, incidents, observations);
                  // Example usage:
                // Call this function whenever you need to update the chart values
                //updateChartValues(surveys, tickets, incidents, observations);

            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

        
    });
});