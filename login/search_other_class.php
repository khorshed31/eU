	      <!-- block -->
                        <div class="block" id="search_class">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><strong>Search Past Course</strong></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="search_class.php">	
										<div class="control-group">
											<label>Course Name:</label>
                                          <div class="controls">
                                            <select name="title"  class="span8" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from subject");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option><?php echo $row['subject_title']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="search" class="btn btn-info"><i class="icon-search"></i> Search</button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->