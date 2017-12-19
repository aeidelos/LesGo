<!-- ./wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
      </div>
            <strong>Final Project - Manajemen Proyek Perangkat Lunak</strong> @2017
    </div>
    <!-- /.container -->
  </footer>
  <?php 
        $page_js;
        if($page==null){
            $page_js = '/restricted/component/homepage_js.php';
        }else{

        }
        $this->load->view($page_js);
   ?>
</body>
</html>