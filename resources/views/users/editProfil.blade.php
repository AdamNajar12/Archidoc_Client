@extends('layouts.dashboard_Admin')
@section('main')
<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Navbar-->
								<div class="card mb-5 mb-xl-10">
									<div class="card-body pt-9 pb-0">
										<!--begin::Details-->
										<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
											<!--begin: Pic-->
											<div class="me-7 mb-4">
												<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
													@if(auth()->user()->image)
                                                    <img src="{{ asset('storage/user_image/' . auth()->user()->image->nom_image) }}" alt="image" />
                                                    @else
                                                    <img src="{{ asset('frontend/media/avatars/blank.png') }}" alt="image" />
                                                    @endif
													<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
												</div>
											</div>
											<!--end::Pic-->
											<!--begin::Info-->
											<div class="flex-grow-1">
												<!--begin::Title-->
												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<!--begin::User-->
													<div class="d-flex flex-column">
														<!--begin::Name-->
														<div class="d-flex align-items-center mb-2">
															<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{auth()->user()->prenom}} {{auth()->user()->nom}}</a>
															<a href="#">
																<!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																		<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
																		<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</a>
															<a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{auth()->user()->role}}</a>
														</div>
														<!--end::Name-->
														<!--begin::Info-->
														<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
															<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
															<span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
																	<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->{{auth()->user()->user_name}}</a>
															
															<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
															<span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
																	<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->{{auth()->user()->email}}</a>
														</div>
														<!--end::Info-->
													</div>
													<!--end::User-->
													<!--begin::Actions-->
													
													<!--end::Actions-->
												</div>
												<!--end::Title-->
												<!--begin::Stats-->
												<div class="d-flex flex-wrap flex-stack">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column flex-grow-1 pe-8">
														<!--begin::Stats-->
														<div class="d-flex flex-wrap">
															<!--begin::Stat-->
															
															<!--end::Stat-->
															<!--begin::Stat-->
															
															<!--end::Stat-->
															<!--begin::Stat-->
															
															<!--end::Stat-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Wrapper-->
													<!--begin::Progress-->
													
													<!--end::Progress-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Details-->
										<!--begin::Navs-->
										
										<!--begin::Navs-->
									</div>
								</div>
								<!--end::Navbar-->
								<!--begin::Basic info-->
								<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0">Profile Details</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->
									<!--begin::Content-->
									<div id="kt_account_profile_details" class="collapse show">
										<!--begin::Form-->
										<form  action="{{ route('users.updateProfil') }}" method="POST" class="form" enctype="multipart/form-data" >
											@csrf
                                                   @method('PUT')
                                            <!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Image</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8">
														<!--begin::Image input-->
														<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
															<!--begin::Preview existing avatar-->
															@if(auth()->user()->image)
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('storage/user_image/' . auth()->user()->image->nom_image) }})"></div>
															
															@else
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('frontend/media/avatars/blank.png') }})"></div>
															
															@endif<!--end::Preview existing avatar-->
															<!--begin::Label-->
															<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																<i class="bi bi-pencil-fill fs-7"></i>
																<!--begin::Inputs-->
																<input type="file" name="nom_image" id="name_image" accept=".png, .jpg, .jpeg" />
																<input type="hidden" name="avatar_remove" />
																<!--end::Inputs-->
															</label>
															<!--end::Label-->
															<!--begin::Cancel-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Cancel-->
															<!--begin::Remove-->
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Remove-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														<!--end::Hint-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8">
														<!--begin::Row-->
														<div class="row">
															<!--begin::Col-->
															<div class="col-lg-6 fv-row">
																<input type="text" id="nom"name="nom" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nom" value="{{auth()->user()->nom}}" />
															</div>
															<!--end::Col-->
															<!--begin::Col-->
															<div class="col-lg-6 fv-row">
																<input type="text"id="prenom"name="prenom" class="form-control form-control-lg form-control-solid" placeholder="Prenom" value="{{auth()->user()->prenom}}" />
															</div>
															<!--end::Col-->
														</div>
														<!--end::Row-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="email" name="email"id="email"class="form-control form-control-lg form-control-solid" placeholder="email" value="{{auth()->user()->email}}" />
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">
														<span class="required">User name</span>
														<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
													</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="text" id="user_name"name="user_name" class="form-control form-control-lg form-control-solid" placeholder="" value="{{auth()->user()->user_name}}" />
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												
												<!--end::Input group-->
												<!--begin::Input group-->
												
												<!--end::Input group-->
												<!--begin::Input group-->
												
												<!--end::Input group-->
												<!--begin::Input group-->
												
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Role</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<select name="role"  class="form-select form-select-solid form-select-lg">
															 <option value="admin" {{ auth()->user()->role === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="intervenant" {{  auth()->user()->role === 'intervenant' ? 'selected' : '' }}>Intervenant</option>
        <option value="super admin" {{  auth()->user()->role=== 'super admin' ? 'selected' : '' }}>Super Admin</option>
														</select>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												
												<!--end::Input group-->
												<!--begin::Input group-->
												
												<!--end::Input group-->
											</div>
											<!--end::Card body-->
											<!--begin::Actions-->
											<div class="card-footer d-flex justify-content-end py-6 px-9">
												
												<button type="submit" class="btn btn-primary" >Save Changes</button>
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Basic info-->
								<!--begin::Sign-in Method-->
								
								<!--end::Sign-in Method-->
								<!--begin::Connected Accounts-->
								
								<!--end::Connected Accounts-->
								<!--begin::Notifications-->
								
								<!--end::Notifications-->
								<!--begin::Notifications-->
								
								<!--end::Notifications-->
								<!--begin::Deactivate Account-->
								
								<!--end::Deactivate Account-->
								<!--begin::Modals-->
								<!--begin::Modal - Two-factor authentication-->
								<div class="modal fade" id="kt_modal_two_factor_authentication" tabindex="-1" aria-hidden="true">
									<!--begin::Modal header-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header flex-stack">
												<!--begin::Title-->
												<h2>Choose An Authentication Method</h2>
												<!--end::Title-->
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--begin::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y pt-10 pb-15 px-lg-17">
												<!--begin::Options-->
												<div data-kt-element="options">
													<!--begin::Notice-->
													<p class="text-muted fs-5 fw-bold mb-10">In addition to your username and password, you’ll have to enter a code (delivered via app or SMS) to log into your account.</p>
													<!--end::Notice-->
													<!--begin::Wrapper-->
													<div class="pb-10">
														<!--begin::Option-->
														<input type="radio" class="btn-check" name="auth_option" value="apps" checked="checked" id="kt_modal_two_factor_authentication_option_1" />
														<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5" for="kt_modal_two_factor_authentication_option_1">
															<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
															<span class="svg-icon svg-icon-4x me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
																	<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<span class="d-block fw-bold text-start">
																<span class="text-dark fw-bolder d-block fs-3">Authenticator Apps</span>
																<span class="text-muted fw-bold fs-6">Get codes from an app like Google Authenticator, Microsoft Authenticator, Authy or 1Password.</span>
															</span>
														</label>
														<!--end::Option-->
														<!--begin::Option-->
														<input type="radio" class="btn-check" name="auth_option" value="sms" id="kt_modal_two_factor_authentication_option_2" />
														<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="kt_modal_two_factor_authentication_option_2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
															<span class="svg-icon svg-icon-4x me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
																	<path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<span class="d-block fw-bold text-start">
																<span class="text-dark fw-bolder d-block fs-3">SMS</span>
																<span class="text-muted fw-bold fs-6">We will send a code via SMS if you need to use your backup login method.</span>
															</span>
														</label>
														<!--end::Option-->
													</div>
													<!--end::Options-->
													<!--begin::Action-->
													<button class="btn btn-primary w-100" data-kt-element="options-select">Continue</button>
													<!--end::Action-->
												</div>
												<!--end::Options-->
												<!--begin::Apps-->
												<div class="d-none" data-kt-element="apps">
													<!--begin::Heading-->
													<h3 class="text-dark fw-bolder mb-7">Authenticator Apps</h3>
													<!--end::Heading-->
													<!--begin::Description-->
													<div class="text-gray-500 fw-bold fs-6 mb-10">Using an authenticator app like
													<a href="https://support.google.com/accounts/answer/1066447?hl=en" target="_blank">Google Authenticator</a>,
													<a href="https://www.microsoft.com/en-us/account/authenticator" target="_blank">Microsoft Authenticator</a>,
													<a href="https://authy.com/download/" target="_blank">Authy</a>, or
													<a href="https://support.1password.com/one-time-passwords/" target="_blank">1Password</a>, scan the QR code. It will generate a 6 digit code for you to enter below.
													<!--begin::QR code image-->
													<div class="pt-5 text-center">
														<img src="assets/media/misc/qr.png" alt="" class="mw-150px" />
													</div>
													<!--end::QR code image--></div>
													<!--end::Description-->
													<!--begin::Notice-->
													<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
														<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
																<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack flex-grow-1">
															<!--begin::Content-->
															<div class="fw-bold">
																<div class="fs-6 text-gray-700">If you having trouble using the QR code, select manual entry on your app, and enter your username and the code:
																<div class="fw-bolder text-dark pt-2">KBSS3QDAAFUMCBY63YCKI5WSSVACUMPN</div></div>
															</div>
															<!--end::Content-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Notice-->
													<!--begin::Form-->
													<form data-kt-element="apps-form" class="form" action="#">
														<!--begin::Input group-->
														<div class="mb-10 fv-row">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter authentication code" name="code" />
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="d-flex flex-center">
															<button type="reset" data-kt-element="apps-cancel" class="btn btn-light me-3">Cancel</button>
															<button type="submit" data-kt-element="apps-submit" class="btn btn-primary">
																<span class="indicator-label">Submit</span>
																<span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
															</button>
														</div>
														<!--end::Actions-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Options-->
												<!--begin::SMS-->
												<div class="d-none" data-kt-element="sms">
													<!--begin::Heading-->
													<h3 class="text-dark fw-bolder fs-3 mb-5">SMS: Verify Your Mobile Number</h3>
													<!--end::Heading-->
													<!--begin::Notice-->
													<div class="text-muted fw-bold mb-10">Enter your mobile phone number with country code and we will send you a verification code upon request.</div>
													<!--end::Notice-->
													<!--begin::Form-->
													<form data-kt-element="sms-form" class="form" action="#">
														<!--begin::Input group-->
														<div class="mb-10 fv-row">
															<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Mobile number with country code..." name="mobile" />
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="d-flex flex-center">
															<button type="reset" data-kt-element="sms-cancel" class="btn btn-light me-3">Cancel</button>
															<button type="submit" data-kt-element="sms-submit" class="btn btn-primary">
																<span class="indicator-label">Submit</span>
																<span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
															</button>
														</div>
														<!--end::Actions-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::SMS-->
											</div>
											<!--begin::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal header-->
								</div>
								<!--end::Modal - Two-factor authentication-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>

@endsection