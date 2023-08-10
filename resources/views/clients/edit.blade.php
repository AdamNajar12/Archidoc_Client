@extends('layouts.dashboard_Admin')
@section('main')
<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
											<form class="form" action="{{ route('clients.update', $client->id) }}" method="POST"  >
												    @csrf
                                                   @method('PUT')
                                                <!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_add_customer_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Modifier Client</h2>
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
													<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="required fs-6 fw-bold mb-2">code client</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="code_client" id="code_client" value="{{ $client->code_client }}" />
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">raison Sociale</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="raison_sociale" id="raison_sociale" value="{{ $client->raison_sociale }}"/>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">Telephone </label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="tel" class="form-control form-control-solid" placeholder="" name="telephone" id="telephone" value="{{ $client->telephone }}"/>
															<!--end::Input-->
														</div>
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">Adresse </label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="tel" class="form-control form-control-solid" placeholder="" name="Adresse" id="Adresse" value="{{ $client->Adresse }}" />
															<!--end::Input-->
														</div>
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">localisation </label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="tel" class="form-control form-control-solid" placeholder="" name="localisation" id="localisation" value="{{ $client ->localisation }}"/>
															<!--end::Input-->
														</div>
														     	  <div id="applications-container">
        <div class="d-flex flex-column mb-7 fv-row">
            <label class="fs-6 fw-bold mb-2">
                <span class="required">Application</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Application utilisée"></i>
            </label>
            <select name="applications[]" class="form-select form-select-solid fw-bolder" multiple>
                @foreach ($Applications as $Application)
                    <option value="{{ $Application->id }}">{{ $Application->libelle }}</option>
                @endforeach
            </select>
			

        </div>
    </div>
														<!--end::Input group-->
														<!--begin::Billing toggle-->
																										<!--end::Button-->
                                                                                                        <a href="/clients"class="btn btn-light me-3"id="kt_modal_add_customer_cancel">	cancel
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
