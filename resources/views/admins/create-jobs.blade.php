
@extends('layouts.admin')

@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Create Jobs</h5>
            
              <form class="p-4 p-md-5" action="post-job.php" method="post">
            
                <!--job details-->
              
                <div class="form-group">
                  <label for="job-title">Job Title</label>
                  <input type="text" name="job_title" class="form-control" id="job-title" placeholder="Product Designer">
                </div>
              
  
                <div class="form-group">
                  <label for="job-region">Job Region</label>
                  <select name="job_region" class="form-select form-control" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                        <option>Anywhere</option>
                        <option>San Francisco</option>
                        <option>Palo Alto</option>
                        <option>New York</option>
                        <option>Manhattan</option>
                        <option>Ontario</option>
                        <option>Toronto</option>
                        <option>Kansas</option>
                        <option>Mountain View</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="job-title">Company</label>
                    <input type="text" name="company" class="form-control" id="job-title" placeholder="company">
                </div>
  
                <div class="form-group">
                  <label for="job-type">Job Type</label>
                  <select name="job_type" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option>Part Time</option>
                    <option>Full Time</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="job-location">Vacancy</label>
                  <input name="vacancy" type="text" class="form-control" id="job-location" placeholder="e.g. 3">
                </div>
                <div class="form-group">
                  <label for="job-type">Experience</label>
                  <select name="experience" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                    <option>1-3 years</option>
                    <option>3-6 years</option>
                    <option>6-9 years</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="job-type">Salary</label>
                  <select name="salary" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                    <option>$50k - $70k</option>
                    <option>$70k - $100k</option>
                    <option>$100k - $150k</option>
                  </select>
                </div>
  
                <div class="form-group">
                  <label for="job-type">Gender</label>
                  <select name="gender" class="selectpicker border rounded form-control " id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Any</option>
                  </select>
                </div>
  
                <div class="form-group">
                  <label for="job-location">Application Deadline</label>
                  <input name="application_deadline" type="text" class="form-control" id="" placeholder="e.g. 20-12-2022">
                </div>
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Job Description</label> 
                    <textarea name="job_description" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
                  </div>
                </div>
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Responsibilities</label> 
                    <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
                  </div>
                </div>
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Education & Experience</label> 
                    <textarea name="education_experience" id="" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience..."></textarea>
                  </div>
                </div>
  
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="">Other Benifits</label> 
                    <textarea name="other_benifits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
                  </div>
                </div>
             
                <!--company details-->
  
  
                <div class="form-group">
                    <label for="job-type">Categroy</label>
                    <select name="categroy" class="selectpicker border rounded form-control " id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                      <option>Programming</option>
                      <option>Design</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="job-location">Images</label>
                    <input name="image" type="file" class="form-control">
                </div>
                
                <div class="col-lg-4 ml-auto">
                    <div class="row">  
                      <div class="col-6">
                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                      </div>
                    </div>
                </div>
  
  
              </form>
            </div>
          </div>
        </div>
      </div>

      @endsection
