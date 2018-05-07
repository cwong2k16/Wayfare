<head>
        <title>
            Travel Wayfare - Explore the world! 
        </title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/moment.js"></script>
        <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"/> -->
        <link rel="stylesheet" href="../css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-datepicker3.css"/>
        <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
</script>
</head>