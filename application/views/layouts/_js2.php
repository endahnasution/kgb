<!-- JavaScript -->
<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
<script>
	window.onload = function() {
		<?php if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		} ?>
	}

	function effect_msg_form() {
		$('.form-msg').slideDown(9999999),
		setTimeout(function() {
			$('.form-msg').slideUp(9999999);
		}, 9999999)
	}

	function effect_msg() {
		$('.msg').show(9999999),
		setTimeout(function() {
			$('.msg').fadeOut(9999999);
		}, 9999999)
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.category').select2();
	});
</script>
<script>
	$(function() {
		$("#tbl").DataTable();
	});
</script>
<!-- jQuery 3 -->



<!-- AdminLTE App -->
<script src="<?php echo base_url('assets'); ?>/vendor/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets'); ?>/vendor/select2/js/select2.full.min.js"></script>
<!-- ChartJs -->
<script src="<?php echo base_url('assets'); ?>/vendor/chartjs/Chart.js"></script>
<!-- Idle Auto Logout -->
<script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery.idle.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
	$(function() {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		
		//bootstrap WYSIHTML5 - text editor
		$(".textarea").wysihtml5();
		// CKEDITOR.replace('editor1');
	});
</script>



<script>
	$(document).idle({
		onIdle: function() {
			alert('Silahkan Login Kembali');
			window.location.href = '<?php echo base_url() ?>auth/logout';
		},
		idle: 900000
	});
</script>
<script>
	var fieldId = 0;

	function addElement(parentId, elementTag, elementId, html) {
		var id = document.getElementById(parentId);
		var newElement = document.createElement(elementTag);
		newElement.setAttribute('id', elementId);
		newElement.innerHTML = html;
		id.appendChild(newElement);

	}

	function removeField(elementId) {
		var fieldId = "field-" + elementId;
		var element = document.getElementById(fieldId);
		element.parentNode.removeChild(element);
	}

	function addField() {
		fieldId++;
		var html = '<br/><div class="input-group"> <span class="input-group-addon"><i class="fa fa-list-alt"></i></span> <select class="form-control" value="" name="komoditi" required> <option value="" disabled selected>- Komoditi -</option> <option value="#">SK</option> <option value="#">Obat</option> <option value="#">Kos</option> <option value="#">OT</option> <option value="#">Pangan</option> </select> </div> <br>' +
		'<div class="input-group"> <span class="input-group-addon"><i class="fa fa-flask"></i></span> <input onkeyup="findTotal1()" type="text" name="sampel" id="qty1" class="form-control" value="" placeholder="Jumlah Sampel" required> </div> <br>' +
		'<div class="input-group"> <span class="input-group-addon"><b>Rp.</b></span> <input onkeyup="findTotal2()" type="text" name="harga" id="qty2" class="form-control" value="" placeholder="Harga" required> </div> </br>' +
		'<div class="b" ><button class="btn btn-danger" onclick="removeField(' + fieldId + ');"><span class="glyphicon glyphicon-remove"></span></button> </div> ';
		addElement('forms', 'div', 'field-' + fieldId, html);
	}

	function addField2() {
		fieldId++;
		var html = '<br/><div class="input-group"> <span class="input-group-addon"><i class="fa fa-list-alt"></i></span> <select class="form-control" id="#" name="komoditi" required> <option value="" disabled selected>- Komoditi -</option> <option value="#">SK</option> <option value="#">Obat</option> <option value="#">Kos</option> <option value="#">OT</option> <option value="#">Pangan</option> </select> </div> <br>' +
		'<div class="input-group"> <span class="input-group-addon"><i class="fa fa-flask"></i></span> <input onkeyup="findTotal1()" type="text" name="sampel" id="qty1" class="form-control" value="" placeholder="Jumlah Sampel" required> </div> <br>' +
		'<div class="input-group"> <span class="input-group-addon"><b>Rp.</b></span> <input onkeyup="findTotal2()" type="text" name="harga" id="qty2" class="form-control" value="" placeholder="Harga" required> </div> </br>' +
		'<button class="btn btn-danger" onclick="removeField(' + fieldId + ');"><span class="glyphicon glyphicon-remove"></span></button> ';
		addElement('forms1', 'div', 'field-' + fieldId, html);
	}
</script>
<script>
	function findTotal1() {
		var arr = document.getElementsByName('sampel');
		var tot = 0;
		for (var i = 0; i < arr.length; i++) {
			if (parseInt(arr[i].value))
				tot += parseInt(arr[i].value);
		}
		document.getElementById('total_sampel').value = tot;
	};
	document.addEventListener("DOMContentLoaded", function(event) {
		findTotal();
	});

	function findTotal2() {
		var arr = document.getElementsByName('harga');
		var tot = 0;
		for (var i = 0; i < arr.length; i++) {
			if (parseInt(arr[i].value))
				tot += parseInt(arr[i].value);
		}
		document.getElementById('total_harga').value = tot;
	};
	document.addEventListener("DOMContentLoaded", function(event) {
		findTotal();
	});
</script>
<script>
	$(function() {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */

		//--------------
		//- AREA CHART -
		//--------------

		// Get context with jQuery - using jQuery's .get() method.
		var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var areaChart = new Chart(areaChartCanvas);

		var areaChartData = {
			labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September", "Oktober", "November", "Desember"],
			datasets: [{
				label: "Expired",
				fillColor: "#dd4b39",
				strokeColor: "#dd4b39",
				pointColor: "#dd4b39",
				pointStrokeColor: "#dd4b39",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#dd4b39",
				data: [
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',1)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',2)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',3)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',4)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',5)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',6)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',7)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',8)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',9)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',10)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',11)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',12)->where('timeline <=',3)->from("view_notif")->count_all_results(); ?>			
				]
			},
			{
				label: "Tenggang",
				fillColor: "#f39c12",
				strokeColor: "#f39c12",
				pointColor: "#f39c12",
				pointStrokeColor: "#f39c12",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#f39c12",
				data: [
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',1)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',2)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',3)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',4)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',5)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',6)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',7)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',8)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',9)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',10)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',11)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',12)->where('timeline >=',4)->where('timeline <=',7)->from("view_notif")->count_all_results(); ?>
				]
			},
			{
				label: "Aktif",
				fillColor: "#00a65a",
				strokeColor: "#00a65a",
				pointColor: "#00a65a",
				pointStrokeColor: "#00a65a",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#00a65a",
				data: [
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',1)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',2)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',3)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',4)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',5)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',6)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',7)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',8)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',9)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',10)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',11)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>,
				<?php echo $this->db->where('MONTH(tanggal_timeline)=',12)->where('timeline >',7)->from("view_notif")->count_all_results(); ?>
				]
			}
			]
		};
		//-------------
		//- BAR CHART -
		//-------------
		var barChartCanvas = $("#barChart").get(0).getContext("2d");
		var barChart = new Chart(barChartCanvas);
		var barChartData = areaChartData;
		
		var barChartOptions = {
			//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
			scaleBeginAtZero: true,
			//Boolean - Whether grid lines are shown across the chart
			scaleShowGridLines: true,
			//String - Colour of the grid lines
			scaleGridLineColor: "rgba(0,0,0,.05)",
			//Number - Width of the grid lines
			scaleGridLineWidth: 1,
			//Boolean - Whether to show horizontal lines (except X axis)
			scaleShowHorizontalLines: true,
			//Boolean - Whether to show vertical lines (except Y axis)
			scaleShowVerticalLines: true,
			//Boolean - If there is a stroke on each bar
			barShowStroke: true,
			//Number - Pixel width of the bar stroke
			barStrokeWidth: 2,
			//Number - Spacing between each of the X value sets
			barValueSpacing: 5,
			//Number - Spacing between data sets within X values
			barDatasetSpacing: 1,
			//String - A legend template
			legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
			//Boolean - whether to make the chart responsive
			responsive: true,
			maintainAspectRatio: true
		};

		

		barChartOptions.datasetFill = false;
		barChart.Bar(barChartData, barChartOptions);
	});
</script>

<!-- multiple droprdown -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<!-- dynamic form -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){

    var i = 1;

    $("#add").click(function(){
      i++;
      $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list"/></td><td><input type="text" name="email[]" placeholder="Enter your Email" class="form-control name_email"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
    });

    // $("#submit").on('click',function(){
    //   var formdata = $("#add_name").serialize();
    //   $.ajax({
    //     url   :"coba2.php",
    //     type  :"POST",
    //     data  :formdata,
    //     cache :false,
    //     success:function(result){
    //       alert(result);
    //       $("#add_name")[0].reset();
    //     }
    //   });
    // });
  });
</script>
