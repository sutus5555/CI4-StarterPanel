<script>
    $(document).ready(function() {
        // Function to initialize a DataTable
        function initializeDataTable(tableId, additionalSettings) {
            var specsgroupColors2 = {
                1: '#d0e2ff', // Blue
                2: '#fff4e0', // Indigo
                3: '#e6fcf5', // Purple
            };

            var defaultSettings = {
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        text: 'Copy to Clipboard'
                    },
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                        filename: 'category_data',
                        extension: '.xlsx',
                        exportOptions: {
                            columns: ':visible' // Export visible columns
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        filename: 'category_data',
                        extension: '.pdf',
                        title: 'Category Data',
                        exportOptions: {
                            columns: ':visible' // Export visible columns
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print Table'
                    },
                    {
                        extend: 'colvis',
                        text: 'Select Columns'
                    }
                ],
                // ใส้สี column ที่ต้องการ
                createdRow: function(row, data, dataIndex) {
                    // Set the background color based on specsgroup value
                    var specsgroup = data.specsgroup; // Assuming specsgroup is a property in your data
                    var backgroundColor = specsgroupColors2['0'] || '';
                    $(row).find('td:eq(2)').css('background-color', backgroundColor);
                }
            };

            // Merge default settings with additional settings
            var mergedSettings = $.extend(true, {}, defaultSettings, additionalSettings);

            // Initialize the DataTable
            return $(tableId).DataTable(mergedSettings);
        }

        // Initialize DataTables
        var groupTable = initializeDataTable('#groupTable');
        var subCategoryTable = initializeDataTable('#SubCategoryTable');
        var subCategoryTable = initializeDataTable('#QClogdata');


        var userLogDataTable = initializeDataTable('#userlogdata', {
            lengthMenu: [10, 20, 30, 40, 50], // Specify the row count options
            pageLength: 30, // Set the default number of rows to 30
            buttons: [{
                    extend: 'pageLength',
                    text: 'Page Length'
                }
                // Add any additional buttons or settings specific to this table
            ]
        });

    });

  
    function openProfileModal() {
        // Code to show/handle the modal
        $('#editProfileModal').modal('show');
    }

</script>