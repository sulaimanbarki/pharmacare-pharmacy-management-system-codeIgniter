
<!-- Stock List Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('invoice_search') ?></h1>
	        <small><?php echo display('invoice_search') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('search') ?></a></li>
	            <li class="active"><?php echo display('invoice_search') ?></li>
	        </ol>
	    </div>
	</section>

	<section class="content">

		<div class="row">
            <div class="col-sm-12">
               

                    <?php
                    if($this->permission1->method('manage_medicine','read')->access()){ ?>
                        <a href="<?php echo base_url('Csearch/medicine')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('medicine_search')?></a>
                    <?php } ?>
                    <?php
                    if( $this->permission1->method('manage_customer','read')->access()){ ?>
                        <a href="<?php echo base_url('Csearch/customer_search')?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('customer_search')?></a>
                    <?php } ?>
                    <?php
                    if($this->permission1->method('manage_purchase','read')->access() ){ ?>
                        <a href="<?php echo base_url('Csearch/purchase')?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('purchase_search')?></a>
                    <?php } ?>


               
            </div>
        </div>

        <?php
        if( $this->permission1->method('manage_invoice','read')->access()){ ?>
		<!-- Manage Product report -->
		<div class="row">
			<div class="col-sm-12">
		        <div class="panel panel-default">
		            <div class="panel-body"> 
						<?php echo form_open('Csearch/invoice_search',array('class' => 'form-inline', 'id' => 'validate'));?>
							<?php date_default_timezone_set("Asia/Dhaka"); $today = date('Y-m-d'); ?>
							<label class="select"><?php echo display('search') ?>:</label>
							<input type="text" name="what_you_search" class="form-control" placeholder='<?php echo display('what_you_search') ?>' id="what_you_search" required>
							<button type="submit" class="btn btn-primary"><?php echo display('search') ?></button>
			            <?php echo form_close()?>
		            </div>
		        </div>
		    </div>
	    </div>

		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                    <h4><?php echo display('invoice_search') ?></h4>
		                </div>
		            </div>
		            <div class="panel-body">
						<div id="printableArea">
			                <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-hover medicine_search">
			                        <thead>
										<tr>
											<th class="text-center"><?php echo display('date') ?></th>
											<th class="text-center"><?php echo display('invoice_no') ?></th>
											<th class="text-center"><?php echo display('customer') ?></th>
											<th class="text-center"><?php echo display('quantity') ?></th>
											<th class="text-center"><?php echo display('price') ?></th>
											<th class="text-center"><?php echo display('due') ?></th>
                                            <?php
                                            if( $this->permission1->method('manage_invoice','read')->access()){ ?>
											   <th class="text-center"><?php echo display('details') ?></th>
                                            <?php
                                            }
                                            ?>
										</tr>
									</thead>
									<tbody>
									<?php
										if ($search_result != null) {
									?>
										{search_result}
										<tr>
											<td>{date}</td>
											<td>{invoice}</td>
											<td><a href="<?php echo base_url('Ccustomer/customerledger/{customer_id}')?>" target = "_blank">{customer_id}</a></td>
											<td>{quantity}</td>
											<td align="right"><?php echo (($position==0)?"$currency {total_price}":"{total_price} $currency") ?></td>
											<td align="right"><?php echo (($position==0)?"$currency {due_amount}":"{due_amount} $currency") ?></td>
                                            <?php
                                            if( $this->permission1->method('manage_invoice','read')->access()){ ?>
                                                <td align="center">
                                                    <a href="<?php echo base_url('Cinvoice/invoice_inserted_data/{invoice_id}');?>" target="_blank"><button class="btn btn-success"><?php echo display('details')?></button>
                                                    </a>
                                                </td>
                                            <?php
                                            }
                                            ?>
										</tr>
										{/search_result}
									<?php
										
									}else{
									?>
                                <tr>
                                	<td colspan="7"><center> No Result Found</center></td>
                                </tr>
								<?php }?>
									</tbody>
			                    </table>
			                </div>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
        <?php
        }
        else{
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo display('You do not have permission to access. Please contact with administrator.');?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

	</section>
</div>
