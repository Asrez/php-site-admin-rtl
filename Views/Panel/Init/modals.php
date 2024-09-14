<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
                </div>
                <label class="form-label"></label>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Content</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Create New Post
                </a>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-report2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
                </div>
                <label class="form-label">Type</label>
                <div class="form-selectgroup-boxes row mb-3">
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">User</span>
                                    <span class="d-block text-muted">cant access the admin panel</span>
                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Admin</span>
                                    <span class="d-block text-muted">can access the admin panel</span>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-16">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input  class="form-control" type="password">
                        </div>
                    </div>
                    <div class="col-lg-16">
                        <div>
                            <label class="form-label">Repassword</label>
                            <input class="form-control" type="password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Create new User
                </a>
            </div>
        </div>
    </div>
</div>