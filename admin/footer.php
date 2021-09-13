                      </div>

                    </div>
                </div>



            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="datatables.min.css"/>
 
<script type="text/javascript" src="datatables.min.js"></script>


	<script>
		jQuery('.numonly').bind('input paste', function(){
				this.value = this.value.replace(/[^0-9]/g, '');
		});
		  
		jQuery('.deconly').bind('input paste', function(){
				this.value = this.value.replace(/((^[0-9]*[.])?[0-9]+$)/g, '');
		});
	</script>


</body>

</html>
