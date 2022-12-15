<div class="footer">
        
       <p class="footer-text"> Kevin Andrade 2022 &copy | 
        <?php
            //From tim Henry's class_web_site
            date_default_timezone_set('America/New_York');
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "Site last upadated $mod_date"; 
        ?>
        </p>
</div>