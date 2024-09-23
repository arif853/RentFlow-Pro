<?php 
   include 'include/header.php';
   include 'include/sidebar.php';
   ?>
<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Building</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit Building</li>
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
                  <h5 class="mb-2 mb-sm-0">Edit Building</h5>
                  <div class="ms-auto">
                     <a href="manage-building.php" class="btn btn-secondary">Manage Building</a>
                     <button type="button" class="btn btn-success">Update</button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row g-3">
                  <div class="col-12 col-lg-12">
                     <div class="card shadow-none bg-light border">
                        <div class="card-body">
                           <form class="row g-3">
                              <!--Row-1-->
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Building Name</label>
                                 <input type="text" class="form-control" placeholder="Building Name">
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Building Type</label>
                                 <select class="form-select">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Teen Sheed</option>
                                    <option>Semi Paka</option>
                                    <option>Others</option>
                                 </select>
                              </div>
                              <!--Row-2-->
                              <!--Row-4-->
                              <div class="col-12 col-md-9">
                                 <label class="form-label">Address</label>
                                 <input type="text" class="form-control" placeholder="Address">
                              </div>
                              <div class="col-12 col-md-3">
                                 <label class="form-label">Building Code</label>
                                 <input type="text" class="form-control" placeholder="Building Code">
                              </div>
                              <!--Row-5-->
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Area/Location </label>
                                 <select class="form-select">
                                    <option>Location 1</option>
                                    <option>Location 2</option>
                                    <option>Location 3</option>
                                 </select>
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Manager/Employee Name</label>
                                 <select class="form-select">
                                    <option>Employee 1</option>
                                    <option>Employee 2</option>
                                    <option>Employee 3</option>
                                 </select>
                              </div>
                              <div class="col-12 col-md-6">
                                 <div class="card border shadow-none radius-10" style="margin-bottom: 0px;">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-12 col-md-4">
                                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1164363998487!2d90.41584228555702!3d23.743226934082934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b998ed9235f1%3A0xedb5992f595ad41f!2sQbit%20Tech!5e0!3m2!1sen!2sbd!4v1723979821812!5m2!1sen!2sbd" 
                                                width="100%" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                          </div>
                                          <div class="col-12 col-md-8">
                                             <ul class="list-group list-group-flush">
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                   <span class="side-title">Location:</span>
                                                   <span>Shahjahanpur</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                   <span class="side-title">Location ID:</span>
                                                   <span>LC-2301</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                   <span class="side-title">Zip Code:</span>
                                                   <span>1217</span>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6">
                                 <div class="card border shadow-none radius-10" style="margin-bottom: 0px;">
                                    <div class="card-body">
                                          <div class="d-flex align-items-center gap-3">
                                             <div class="">
                                                <img src="assets/images/Man.jpg" width="80" alt="">
                                             </div>
                                             <div class="">
                                                <ul class="list-group list-group-flush">
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                   <span class="side-title">Name:</span>
                                                   <span>Antone Wintheiser</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                   <span class="side-title">Designation:</span>
                                                   <span>Manager</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent mb-2">
                                                   <span class="side-title">Phone:</span>
                                                   <span>+880 222 444 555</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center bg-transparent">
                                                   <span class="side-title">Date of Joining:</span>
                                                   <span>15 Aug 2024</span>
                                                </li>
                                             </ul>
                                             </div>
                                             <div class="">
                                                <img src="assets/images/Signature.png" width="80" alt="">
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Security Gard Name</label>
                                 <input type="text" class="form-control" placeholder="Security Gard Name">
                              </div>
                              <div class="col-12 col-md-6">
                                 <label class="form-label">Gard Contact Number</label>
                                 <input type="text" class="form-control" placeholder="Gard Contact Number">
                              </div>
                              <div class="col-12 col-md-4">
                                 <label class="form-label">Gate Open Time </label>
                                 <input type="time" class="form-control" placeholder="Gate Open Time ">
                              </div>
                              <div class="col-12 col-md-4">
                                 <label class="form-label">Gate Close Time</label>
                                 <input type="time" class="form-control" placeholder="Gate Close Time">
                              </div>
                              <div class="col-12 col-md-4">
                                 <label class="form-label">Status</label>
                                 <select class="form-select">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                 </select>
                              </div>
                           </form>
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