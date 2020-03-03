<!doctype html>
<html data-n-head-ssr lang="en" data-n-head="lang">

<head data-n-head="">
    <title data-n-head="true">WEV.SE</title>
    <meta data-n-head="true" charset="utf-8">
    <meta data-n-head="true" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/assets/icons/32.png"/>
    
    <link data-n-head="true" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
 <link rel="stylesheet" href="https://wev.se/assets/css/custom.css" />
    <link rel="stylesheet" href="https://wev.se/assets/css/main.css" />

    <script type="text/javascript" src="https://wev.se/assets/js/main.js"></script>
   

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


</head>

<body onload='check()'>
    <div data-server-rendered="true" id="__nuxt">
        <div id="__layout">
            <div class="font-primary">
                <div class="transition bg-teal-800 py-3 fixed z-50 shadow w-full mt-0">
                    <div class="container">
                        <div class="flex flex-wrap justify-between items-center">
                            <style>
                               .wlogout {color: #fff;
    background-color: #e64553;}
    
    .wlogout:hover {background-color: #f96b78;}
    
     .wlogin {color: #285e61;
    background-color: #fff;}
    
    .wlogin:hover {background-color: #234e52;color:#fff;}
                                
                                
                            </style>
                            <span class="text-white font-semibold tracking-wide text-teal-200"><a href="https://wev.se">Wev.SE</a></span>
                            <div class="block lg:hidden">
                                <button class="flex items-center px-3 py-2 focus:outline-none" onclick="removeClass()">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 fill-current text-white">
                                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 

2H4a1 1 0 0 1 0-2z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="memem" class="mt-5 lg:mt-0 w-full lg:w-auto block lg:flex text-teal-200 text-sm font-medium tracking-wide hidden"><a href="https://wev.se/home" class="block px-5 py-3 mx-0 lg:mx-1 mt-1 lg:mt-0 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
Home
</a>
                                <a href="/account/dashboard" class="block px-5 py-3 mx-0 lg:mx-1 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
User Panel
</a> <a href="/pages/privacy-policy" class="block px-5 py-3 mx-0 lg:mx-1 mt-1 lg:mt-0 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
Privacy Policy
</a> <a href="https://wev.se/apk" class="block px-5 py-3 ml-0 lg:ml-1 mt-1 lg:mt-0 hover:bg-teal-900 hover:text-white rounded focus:outline-none">
Android APK
</a>  <div class="login-container"></div>

</div>
                        </div>
                    </div>
                </div>
                <main id="main" class="pb-10 pt-32 text-gray-600">
                    <div class="container min-h-70-screen">
                        <div class="min-h-70-screen">
                            <div class="text-center" style="margin-bottom: 2.5rem;">
                              
                                
                                			<h1 class="text-1xl text-gray-300">This is public history (from anonymous user),
to create private shortlink you must log-in
edit & delete shortlink in user panel</h1>
                                
                            </div>

   <div class="table-responsive mt-8 form-textarea" style="overflow-x:auto;">
           <table id="usertable" class="table table-sm table-dark">
    <thead>
        <tr>
            <th scope="col" style="text-align: left;">Shorturl</th>
            <th scope="col">hits</th>
            <th scope="col">date (UTC)</th>
          
        </tr>
    </thead>
    <tbody>
            <?php
                $url = 'http://wev.se/etc/api';
                $data = array('view' => 'public');
                
                $options = array(
                    'http' => array(
                        'method'  => 'POST',
                        'content' => http_build_query($data)
                    )
                );
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);

                $raw =  json_decode($result, true);

                foreach($raw['data'] as $item) {
                    echo '<tr><td><b><a href="'.$item['url'].'" target="_blank"> wev.se/'.$item['id'].'</a></b>';
						echo '<div class="urlori">'.$item['url'].'</div></td>';
                    echo '<td align="center">'.$item['hits'].'</td>';
                    echo '<td align="center">'.$item['date'].'</td></tr>';
                }
            ?>
             </tbody>
</table>
              </div></div>
                        
                    </div>
                    
                    
                    
                       </main>
                       
                       
                       
                       
                       
                <footer class="py-8 bg-gray-100">
                    <div class="container text-center">
                
                        <p class="text-xs text-gray-500">Copyright © <span class="text-gray-700">Wev.SE</span> 2019</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
   
  

  



    
     <!-- Core plugin JavaScript-->
  <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>
     
    <!-- Page level plugins -->
 

  <!-- Page level custom scripts -->
  

  <script type="text/javascript">
      $(document).ready(function() {
$('#usertable').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "language": {
      "emptyTable": "History Shortlinkmu masih kosong"
    },
    "bInfo": false,
  
    "bAutoWidth": true });
    
});


  </script>
 


</body>

</html>