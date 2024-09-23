<?php 
   include 'include/header.php';
   include 'include/sidebar.php';
   ?>
<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Collection</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">New Collection</li>
            </ol>
         </nav>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="row">
      <div class="col-lg-12 mx-auto">
         <div class="card">
            <div class="card-header py-3 bg-transparent">
               <div class="d-sm-flex align-items-center">
                  <h5 class="mb-2 mb-sm-0">New Collection</h5>
                  <div class="ms-auto">
                      <a href="manage-employee.php" class="btn btn-secondary">Upcoming Collection</a>
                     <button type="button" class="btn btn-primary">Publish</button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row g-3">
                  <div class="col-12 col-lg-7">
                     <div class="card shadow-none bg-light border">
                        <div class="card-body">
                           <form class="row g-3">
                              <!--Row-1-->
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Collection Date</label>
                                 <input type="date" class="form-control" placeholder="Collection Date">
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Select Customer</label>
                                 <select class="form-select">
                                    <option>Masum Billah</option>
                                    <option>Designation 2</option>
                                    <option>Designation 3</option>
                                 </select>
                              </div>
                              
                              
                              
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Email Address</label>
                                 <input type="email" class="form-control" placeholder="Email Address">
                              </div>
                              <!--Row-2-->
                              <!--Row-3-->
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Phone Number </label>
                                 <input type="text" class="form-control" placeholder="Phone Number ">
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Alternative Number </label>
                                 <input type="text" class="form-control" placeholder="Phone Number ">
                              </div>
                              <!--Row-4-->
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Present Address</label>
                                 <textarea class="form-control" placeholder="Present Address" rows="4" cols="4"></textarea>
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Permanent Address</label>
                                 <textarea class="form-control" placeholder="Permanent Address" rows="4" cols="4"></textarea>
                              </div>
                              <!--Row-5-->
                              <div class="col-12 col-md-4">
                                 <label class="form-label">NID Card Number</label>
                                 <input type="text" class="form-control" placeholder="Product title">
                              </div>
                              <div class="col-12 col-md-4">
                                 <label class="form-label">NID Front</label>
                                 <input class="form-control" type="file">
                              </div>
                              <div class="col-12 col-md-4">
                                 <label class="form-label">NID Back</label>
                                 <input class="form-control" type="file">
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Other's Documents</label>
                                 <select class="form-select">
                                    <option>Passport</option>
                                    <option>Birth Certificate</option>
                                    <option>Driving License</option>
                                 </select>
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Documents Photo</label>
                                 <input class="form-control" type="file">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-5">
                     <div class="card shadow-none bg-light border">
                        <div class="card-body">
                           <div class="row g-3">
                              <div class="col-12">
                                 <label class="form-label">Employee ID</label>
                                 <input type="text" class="form-control" placeholder="Employee ID">
                              </div>
                              <div class="col-12">
                                 <label class="form-label">Designation</label>
                                 <select class="form-select">
                                    <option>Designation 1</option>
                                    <option>Designation 2</option>
                                    <option>Designation 3</option>
                                 </select>
                              </div>
                              <div class="col-12">
                                 <label class="form-label">Date of Joining </label>
                                 <input type="date" class="form-control" placeholder="Joining Date">
                              </div>
                              <div class="col-12">
                                 <label class="form-label">Passport Size Photo</label>
                                 <input class="form-control" type="file">
                              </div>
                              <div class="col-12">
                                 <label class="form-label">Signature</label>
                                 <input class="form-control" type="file">
                              </div>
                              <div class="col-12">
                                 <label class="form-label">Status</label>
                                 <select class="form-select">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                 </select>
                              </div>
                           </div>
                           <!--end row-->
                        </div>
                     </div>
                  </div>
               </div>
               <!--end row-->
            </div>
         </div>
      </div>
   </div>
   <!--end row-->
</main>
<!--end page main-->   
<?php include 'include/footer.php';?>