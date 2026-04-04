/*
Author       : Dreamstechnologies
Template Name: PriGina Global Telemed - Bootstrap Template
Version      : 1.0
*/

(function ($) {
    "use strict";

    // Pricing Options Show

    $('#pricing_select input[name="rating_option"]').on("click", function () {
        if ($(this).val() == "price_free") {
            $("#custom_price_cont").hide();
        }
        if ($(this).val() == "custom_price") {
            $("#custom_price_cont").show();
        } else {
        }
    });

    // Education Add More

    $(".education-info").on("click", ".trash", function () {
        $(this).closest(".education-cont").remove();
        return false;
    });

    $(".add-education").on("click", function () {
        var educationcontent =
            '<div class="row education-cont">' +
            '<div class="col-12 col-md-10 col-lg-11">' +
            '<div class="row">' +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>Degree</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>College/Institute</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>Year of Completion</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
            "</div>";

        $(".education-info").append(educationcontent);
        return false;
    });

    // Experience Add More

    $(".experience-info").on("click", ".trash", function () {
        $(this).closest(".experience-cont").remove();
        return false;
    });

    $(".add-experience").on("click", function () {
        var experiencecontent =
            '<div class="row experience-cont">' +
            '<div class="col-12 col-md-10 col-lg-11">' +
            '<div class="row">' +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>Hospital Name</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>From</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>To</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="mb-3">' +
            "<label>Designation</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
            "</div>";

        $(".experience-info").append(experiencecontent);
        return false;
    });

    // Awards Add More

    $(".awards-info").on("click", ".trash", function () {
        $(this).closest(".awards-cont").remove();
        return false;
    });

    $(".add-award").on("click", function () {
        var regcontent =
            '<div class="row awards-cont">' +
            '<div class="col-12 col-md-5">' +
            '<div class="mb-3">' +
            "<label>Awards</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-5">' +
            '<div class="mb-3">' +
            "<label>Year</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-2">' +
            '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
            '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
            "</div>" +
            "</div>";

        $(".awards-info").append(regcontent);
        return false;
    });

    // Membership Add More

    $(".membership-info").on("click", ".trash", function () {
        $(this).closest(".membership-cont").remove();
        return false;
    });

    $(".add-membership").on("click", function () {
        var membershipcontent =
            '<div class="row membership-cont">' +
            '<div class="col-12 col-md-10 col-lg-5">' +
            '<div class="mb-3">' +
            "<label>Memberships</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-2 col-lg-2">' +
            '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
            '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
            "</div>" +
            "</div>";

        $(".membership-info").append(membershipcontent);
        return false;
    });

    // Registration Add More

    $(".registrations-info").on("click", ".trash", function () {
        $(this).closest(".reg-cont").remove();
        return false;
    });

    $(".add-reg").on("click", function () {
        var regcontent =
            '<div class="row reg-cont">' +
            '<div class="col-12 col-md-5">' +
            '<div class="mb-3">' +
            "<label>Registrations</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-5">' +
            '<div class="mb-3">' +
            "<label>Year</label>" +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-12 col-md-2">' +
            '<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
            '<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
            "</div>" +
            "</div>";

        $(".registrations-info").append(regcontent);
        return false;
    });

    // Billing Add More

    $(".add-billing-info").on("click", ".trash", function () {
        $(this).closest(".bill-cont").remove();
        return false;
    });

    $(".add-bill").on("click", function () {
        var billcontent =
            '<div class="row bill-cont">' +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Title <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="d-flex align-items-center">' +
            '<div class="form-wrap w-100">' +
            '<label class="col-form-label">Amount</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="form-wrap ms-2">' +
            '<label class="col-form-label d-block">&nbsp;</label>' +
            '<a href="#" class="trash">Delete</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".add-billing-info").append(billcontent);
        return false;
    });

    // Prescripe Add More

    $(".add-prescripe-info").on("click", ".trash", function () {
        $(this).closest(".prescripe-cont").remove();
        return false;
    });

    $(".add-prescribe").on("click", function () {
        var prescontent =
            '<div class="row prescripe-cont">' +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Name</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Type</label>' +
            '<select class="select">' +
            "<option>Select</option>" +
            "<option>Visit</option>" +
            "<option>Online</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Dosage</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Frequency</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Duration</label>' +
            '<select class="select">' +
            "<option>Select</option>" +
            "<option>1 Month</option>" +
            "<option>1 Day</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="d-flex align-items-center">' +
            '<div class="form-wrap w-100">' +
            '<label class="col-form-label">Instruction</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="form-wrap ms-2">' +
            '<label class="col-form-label d-block">&nbsp;</label>' +
            '<a href="#" class="trash"><i class="fa-solid fa-trash-can"></i></a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".add-prescripe-info").append(prescontent);

        if ($(".select").length > 0) {
            $(".select").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }

        return false;
    });

    // Prescripe Add More

    $(".add-prescripe-info").on("click", ".trash", function () {
        $(this).closest(".prescripe-cont").remove();
        return false;
    });

    $(".add-prescribe").on("click", function () {
        var prescontent =
            '<div class="row prescripe-cont">' +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Name</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Type</label>' +
            '<select class="select">' +
            "<option>Select</option>" +
            "<option>Visit</option>" +
            "<option>Online</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Dosage</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Frequency</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Duration</label>' +
            '<select class="select">' +
            "<option>Select</option>" +
            "<option>1 Month</option>" +
            "<option>1 Day</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-xl-2 xol-lg-3 col-md-6">' +
            '<div class="d-flex align-items-center">' +
            '<div class="form-wrap w-100">' +
            '<label class="col-form-label">Instruction</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="form-wrap ms-2">' +
            '<label class="col-form-label d-block">&nbsp;</label>' +
            '<a href="#" class="trash"><i class="fa-solid fa-trash-can"></i></a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".add-prescripe-info").append(prescontent);

        if ($(".select").length > 0) {
            $(".select").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }

        return false;
    });

    // Add Speciality

    $(".add-service-info").on("click", ".trash", function () {
        $(this).closest(".service-cont").remove();
        return false;
    });

    $(".add-speciality").on("click", function () {
        var servcontent =
            '<div class="user-accordion-item">' +
            '<a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse" data-bs-target="#special">Speciality<span>Delete</span></a>' +
            '<div class="accordion-collapse" id="special" data-bs-parent="#list-accord">' +
            '<div class="content-collapse">' +
            '<div class="add-service-info">' +
            '<div class="add-info">' +
            '<div class="row">' +
            '<div class="col-md-4">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Speciality <span class="text-danger">*</span></label>' +
            '<select class="select">' +
            "<option>Select</option>" +
            "<option>Neurology</option>" +
            "<option>Urology</option>" +
            "</select>" +
            "</div>	" +
            "</div>" +
            "</div>" +
            '<div class="row service-cont">' +
            '<div class="col-md-3">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Service <span class="text-danger">*</span></label>' +
            '<select class="select">' +
            "<option>Select Service</option>" +
            "<option>Surgery</option>" +
            "<option>General Checkup</option>" +
            "</select>" +
            "</div>	" +
            "</div>" +
            '<div class="col-md-2">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Price ($) <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control" placeholder="454">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-7">' +
            '<div class="d-flex align-items-center">' +
            '<div class="form-wrap w-100">' +
            '<label class="col-form-label">About Service</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="form-wrap ms-2">' +
            '<label class="col-form-label d-block">&nbsp;</label>' +
            '<a href="#" class="trash-icon trash">Delete</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="text-end">' +
            '<a href="#" class="add-serv more-item mb-0">Add New Service</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".accordions").append(servcontent);

        if ($(".select").length > 0) {
            $(".select").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }

        return false;
    });

    // Service Add More

    $(".add-service-info").on("click", ".trash", function () {
        $(this).closest(".service-cont").remove();
        return false;
    });

    $(".add-serv").on("click", function () {
        var servcontent =
            '<div class="row service-cont">' +
            '<div class="col-md-3">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Service <span class="text-danger">*</span></label>' +
            '<select class="select">' +
            "<option>Select Service</option>" +
            "<option>Surgery</option>" +
            "<option>General Checkup</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-md-2">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Price ($) <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control" placeholder="454">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-7">' +
            '<div class="d-flex align-items-center">' +
            '<div class="form-wrap w-100">' +
            '<label class="col-form-label">About Service</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="form-wrap ms-2">' +
            '<label class="col-form-label d-block">&nbsp;</label>' +
            '<a href="#" class="trash-icon trash">Delete</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(this)
            .closest(".add-service-info")
            .find(".add-info")
            .append(servcontent);

        if ($(".select").length > 0) {
            $(".select").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }

        return false;
    });

    // Add Membership

    $(".membership-infos").on("click", ".trash", function () {
        $(this).closest(".membership-content").remove();
        return false;
    });

    $(".add-membership-info").on("click", function () {
        var membershipcontent =
            '<div class="row membership-content">' +
            '<div class="col-lg-3 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Title <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control" placeholder="Add Title">' +
            "</div>" +
            "</div>" +
            '<div class="col-lg-9 col-md-6">' +
            '<div class="d-flex align-items-center">' +
            '<div class="form-wrap w-100">' +
            '<label class="col-form-label">About Membership</label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            '<div class="form-wrap ms-2">' +
            '<label class="col-form-label d-block">&nbsp;</label>' +
            '<a href="javascript:void(0);" class="trash-icon trash">Delete</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".membership-infos").append(membershipcontent);
        return false;
    });

    // Add Experience

    $(".experience-infos").on("click", ".trash", function () {
        $(this).closest(".experience-content").remove();
        return false;
    });

    $(".add-experiences").on("click", function () {
        var membershipcontent =
            '<div class="experience-content">' +
            '<div class="user-accordion-item">' +
            '<a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#experience">Experience<span class="trash">Delete</span></a>' +
            '<div class="accordion-collapse collapse show" id="experience" data-bs-parent="#list-accord">' +
            '<div class="content-collapse">' +
            '<div class="add-service-info">' +
            '<div class="add-info">' +
            '<div class="row align-items-center">' +
            '<div class="col-md-12">' +
            '<div class="form-wrap mb-2">' +
            '<div class="change-avatar img-upload">' +
            '<div class="profile-img">' +
            '<i class="fa-solid fa-file-image"></i>' +
            "</div>" +
            '<div class="upload-img">' +
            "<h5>Hospital Logo</h5>" +
            '<div class="imgs-load d-flex align-items-center">' +
            '<div class="change-photo">' +
            "Upload New" +
            '<input type="file" class="upload">' +
            "</div>" +
            '<a href="#" class="upload-remove">Remove</a>' +
            "</div>" +
            '<p class="form-text">Your Image should Below 4 MB, Accepted format jpg,png,svg</p>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Title</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Hospital <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Year of Experience <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Location <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Employement </label>' +
            '<select class="select">' +
            "<option>Full Time</option>" +
            "<option>Part Time</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-12">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Job Description <span class="text-danger">*</span></label>' +
            '<textarea class="form-control" rows="3"></textarea>' +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Start Date <span class="text-danger">*</span></label>' +
            '<div class="form-icon">' +
            '<input type="text" class="form-control datetimepicker">' +
            '<span class="icon"><i class="fa-regular fa-calendar-days"></i></span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">End Date <span class="text-danger">*</span></label>' +
            '<div class="form-icon">' +
            '<input type="text" class="form-control datetimepicker">' +
            '<span class="icon"><i class="fa-regular fa-calendar-days"></i></span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">&nbsp;</label>' +
            '<div class="form-check">' +
            '<label class="form-check-label">' +
            '<input class="form-check-input" type="checkbox"> I Currently Working Here' +
            "</label>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="text-end">' +
            '<a href="#" class="reset more-item">Reset</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".experience-infos").append(membershipcontent);
        if ($(".select").length > 0) {
            $(".select").select2({
                minimumResultsForSearch: -1,
                width: "100%",
            });
        }
        if ($(".datetimepicker").length > 0) {
            $(".datetimepicker").datetimepicker({
                format: "DD/MM/YYYY",
                icons: {
                    up: "fas fa-chevron-up",
                    down: "fas fa-chevron-down",
                    next: "fas fa-chevron-right",
                    previous: "fas fa-chevron-left",
                },
            });
        }

        return false;
    });

    // Add Experience

    $(".education-infos").on("click", ".trash", function () {
        $(this).closest(".education-content").remove();
        return false;
    });

    $(".add-educations").on("click", function () {
        var membershipcontent =
            '<div class="education-content">' +
            '<div class="user-accordion-item">' +
            '<a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#education">Education<span class="trash">Delete</span></a>' +
            '<div class="accordion-collapse collapse show" id="education" data-bs-parent="#list-accord">' +
            '<div class="content-collapse">' +
            '<div class="add-service-info">' +
            '<div class="add-info">' +
            '<div class="row align-items-center">' +
            '<div class="col-md-12">' +
            '<div class="form-wrap mb-2">' +
            '<div class="change-avatar img-upload">' +
            '<div class="profile-img">' +
            '<i class="fa-solid fa-file-image"></i>' +
            "</div>" +
            '<div class="upload-img">' +
            "<h5> Logo</h5>" +
            '<div class="imgs-load d-flex align-items-center">' +
            '<div class="change-photo">' +
            "Upload New" +
            '<input type="file" class="upload">' +
            "</div>" +
            '<a href="#" class="upload-remove">Remove</a>' +
            "</div>" +
            '<p class="form-text">Your Image should Below 4 MB, Accepted format jpg,png,svg</p>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Name of the institution</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Course</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Start Date <span class="text-danger">*</span></label>' +
            '<div class="form-icon">' +
            '<input type="text" class="form-control datetimepicker">' +
            '<span class="icon"><i class="fa-regular fa-calendar-days"></i></span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">End Date <span class="text-danger">*</span></label>' +
            '<div class="form-icon">' +
            '<input type="text" class="form-control datetimepicker">' +
            '<span class="icon"><i class="fa-regular fa-calendar-days"></i></span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-4 col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">No of Years <span class="text-danger">*</span></label>' +
            '<input type="text" class="form-control">' +
            "</div>" +
            "</div>" +
            '<div class="col-lg-12">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Job Description <span class="text-danger">*</span></label>' +
            '<textarea class="form-control" rows="3"></textarea>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="text-end">' +
            '<a href="#" class="reset more-item">Reset</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".education-infos").append(membershipcontent);
        if ($(".datetimepicker").length > 0) {
            $(".datetimepicker").datetimepicker({
                format: "DD/MM/YYYY",
                icons: {
                    up: "fas fa-chevron-up",
                    down: "fas fa-chevron-down",
                    next: "fas fa-chevron-right",
                    previous: "fas fa-chevron-left",
                },
            });
        }

        return false;
    });

    // Add Experience

    $(".awrad-infos").on("click", ".trash", function () {
        $(this).closest(".awrad-content").remove();
        return false;
    });

    $(".add-awrads").on("click", function () {
        var membershipcontent =
            '<div class="awrad-content">' +
            '<div class="user-accordion-item">' +
            '<a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#award">Award<span class="trash">Delete</span></a>' +
            '<div class="accordion-collapse collapse show" id="award" data-bs-parent="#list-accord">' +
            '<div class="content-collapse">' +
            '<div class="add-service-info">' +
            '<div class="add-info">' +
            '<div class="row align-items-center">' +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Award Name</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Year <span class="text-danger">*</span></label>' +
            '<div class="form-icon">' +
            '<input type="text" class="form-control datetimepicker">' +
            '<span class="icon"><i class="fa-regular fa-calendar-days"></i></span>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-12">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Job Description <span class="text-danger">*</span></label>' +
            '<textarea class="form-control" rows="3"></textarea>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="text-end">' +
            '<a href="#" class="reset more-item">Reset</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".awrad-infos").append(membershipcontent);
        if ($(".datetimepicker").length > 0) {
            $(".datetimepicker").datetimepicker({
                format: "DD/MM/YYYY",
                icons: {
                    up: "fas fa-chevron-up",
                    down: "fas fa-chevron-down",
                    next: "fas fa-chevron-right",
                    previous: "fas fa-chevron-left",
                },
            });
        }

        return false;
    });

    // Add Insurance

    $(".insurance-infos").on("click", ".trash", function () {
        $(this).closest(".insurance-content").remove();
        return false;
    });

    $(".add-insurance").on("click", function () {
        var membershipcontent =
            '<div class="insurance-content">' +
            '<div class="user-accordion-item">' +
            '<a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#insurance">Insurance<span class="trash">Delete</span></a>' +
            '<div class="accordion-collapse collapse show" id="insurance" data-bs-parent="#list-accord">' +
            '<div class="content-collapse">' +
            '<div class="add-service-info">' +
            '<div class="add-info">' +
            '<div class="row align-items-center">' +
            '<div class="col-md-12">' +
            '<div class="form-wrap mb-2">' +
            '<div class="change-avatar img-upload">' +
            '<div class="profile-img">' +
            '<i class="fa-solid fa-file-image"></i>' +
            "</div>" +
            '<div class="upload-img">' +
            "<h5> Logo</h5>" +
            '<div class="imgs-load d-flex align-items-center">' +
            '<div class="change-photo">' +
            "Upload New" +
            '<input type="file" class="upload">' +
            "</div>" +
            '<a href="#" class="upload-remove">Remove</a>' +
            "</div>" +
            '<p class="form-text">Your Image should Below 4 MB, Accepted format jpg,png,svg</p>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Insurance Name</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="text-end">' +
            '<a href="#" class="reset more-item">Reset</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".insurance-infos").append(membershipcontent);

        return false;
    });

    // Add Clinic

    $(".clinic-infos").on("click", ".trash", function () {
        $(this).closest(".clinic-content").remove();
        return false;
    });

    $(".add-clinics").on("click", function () {
        var membershipcontent =
            '<div class="clinic-content">' +
            '<div class="user-accordion-item">' +
            '<a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#clinic">Clinic<span class="trash">Delete</span></a>' +
            '<div class="accordion-collapse collapse show" id="clinic" data-bs-parent="#list-accord">' +
            '<div class="content-collapse">' +
            '<div class="add-service-info">' +
            '<div class="add-info">' +
            '<div class="row align-items-center">' +
            '<div class="col-md-12">' +
            '<div class="form-wrap mb-2">' +
            '<div class="change-avatar img-upload">' +
            '<div class="profile-img">' +
            '<i class="fa-solid fa-file-image"></i>' +
            "</div>" +
            '<div class="upload-img">' +
            "<h5>Logo</h5>" +
            '<div class="imgs-load d-flex align-items-center">' +
            '<div class="change-photo">' +
            "Upload New" +
            '<input type="file" class="upload">' +
            "</div>" +
            '<a href="#" class="upload-remove">Remove</a>' +
            "</div>" +
            '<p class="form-text">Your Image should Below 4 MB, Accepted format jpg,png,svg</p>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="col-md-12">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Clinic Name</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Location</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-md-6">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Addrerss</label>' +
            '<input type="text" class="form-control">' +
            "</div>	" +
            "</div>" +
            '<div class="col-md-12">' +
            '<div class="form-wrap">' +
            '<label class="col-form-label">Gallery</label>' +
            '<div class="drop-file">' +
            "<p>Drop files or Click to upload</p>" +
            '<input type="file">' +
            "</div>" +
            '<div class="view-imgs">' +
            '<div class="view-img">' +
            '<img src="build/img/doctors-dashboard/clinic-02.jpg" alt="img">' +
            '<a href="javascript:void(0);">Remove</a>' +
            "</div>" +
            '<div class="view-img">' +
            '<img src="build/img/doctors-dashboard/clinic-01.jpg" alt="img">' +
            '<a href="javascript:void(0);">Remove</a>' +
            "</div>" +
            "</div>" +
            "</div>	" +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="text-end">' +
            '<a href="#" class="reset more-item">Reset</a>' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $(".clinic-infos").append(membershipcontent);

        return false;
    });

    if ($(".dependent-status").length > 0) {
        $(document).ready(function () {
            $(".check").change(function () {
                $(".status-toggle").addClass("checked");
                if ($(this).is(":checked")) {
                    $(this).closest(".status-toggle").removeClass("checked");
                }
            });
        });
    }
})(jQuery);
