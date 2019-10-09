
      <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>

      <script src="https://code.jquery.com/jquery-2.2.4.js"
          integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
          crossorigin="anonymous"></script>

      <script src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/jquery-ui.min.js"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- <script src="{{ asset('js/app.js') }}"></script> -->
       <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.min.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56348541-1"></script>
    <script type="text/javascript">
        $( "#date" ).datepicker({
              changeMonth: true,
              changeYear: true,
              yearRange: '1950:2010',
              dateFormat: 'yy-mm-dd',
              onSelect:function(selectedDate, datePicker) {            
                  self.datas.date = selectedDate;
              }
            });
    </script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-56348541-1');
		</script>