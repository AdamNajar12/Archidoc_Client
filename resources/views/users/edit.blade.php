@extends('layouts.dashboard_Admin')
@section('main')
<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
											<form class="form" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"  >
												    @csrf
                                                   @method('PUT')
                                                <!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_add_customer_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Modifier Utilisateur</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body py-10 px-lg-17">
													<!--begin::Scroll-->
													<div class="scroll-y me-n7 pe-7" >
													               <div class="fv-row mb-7">
																		<!--begin::Label-->
																		<label class="d-block fw-bold fs-6 mb-5">Image</label>
																		<!--end::Label-->
																		<!--begin::Image input-->
																		<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('frontend/media/avatars/blank.png')}}">
																			<!--begin::Preview existing avatar-->
																			<div class="image-input-wrapper w-125px h-125px" style="background-image: url(asset/media/avatars/150-1.jpg);"></div>
																			<!--end::Preview existing avatar-->
																			<!--begin::Label-->
																			<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
																				<i class="bi bi-pencil-fill fs-7"></i>
																				<!--begin::Inputs-->
																				<input type="file"  name="nom_image" id="nom_image" accept=".png, .jpg, .jpeg">
																				<input type="hidden" name="avatar_remove">
																				<!--end::Inputs-->
																			</label>
																			<!--end::Label-->
																			<!--begin::Cancel-->
																			<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
																			<!--end::Cancel-->
																			<!--begin::Remove-->
																			<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
																			<!--end::Remove-->
																		</div>
																		<!--end::Image input-->
																		<!--begin::Hint-->
																		<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
																		<!--end::Hint-->
																	</div>
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="required fs-6 fw-bold mb-2">nom</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="nom" id="nom" value="{{ $user->nom }}" />
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">prenom</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="prenom" id="prenom" value="{{ $user->prenom }}"/>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">Nom utilisateur </label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="tel" class="form-control form-control-solid" placeholder="" name="user_name" id="user_name" value="{{ $user->user_name }}"/>
															 @if ($errors->has('user_name'))
                                                              {{ $errors->first('user_name') }}
															  @endif
															<!--end::Input-->
														</div>
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">role </label>
															<!--end::Label-->
															<!--begin::Input-->
															  <select class="form-control form-control-solid" name="role" id="role" required="required">
        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="intervenant" {{ $user->role === 'intervenant' ? 'selected' : '' }}>Intervenant</option>
        <option value="super admin" {{ $user->role === 'super admin' ? 'selected' : '' }}>Super Admin</option>
    </select>
															<!--end::Input-->
														</div>
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">email</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="tel" class="form-control form-control-solid" placeholder="" name="email" id="email" value="{{ $user->email }}"/>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Billing toggle-->
																										<!--end::Button-->
                                                                                                        <a href="/users"class="btn btn-light me-3"id="kt_modal_add_customer_cancel">	cancel
													</a>
													<!--begin::Button-->
													<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
														<span class="indicator-label">Modifier</span>
													</button>
													<!--end::Button-->
												</div>
												<!--end::Modal footer-->
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>








@endsection
