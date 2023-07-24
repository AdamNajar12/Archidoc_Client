@extends('layouts.dashboard_Admin')
@section('main')
<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
<form class="form" action="{{ route('ticket.update', $ticket->id) }}" method="POST"  >
												    @csrf
                                                   @method('PUT')
                                           
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body py-10 px-lg-17">
													<!--begin::Scroll-->
													<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
																										<label class="required fs-6 fw-bold mb-2">Type d intervention </label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="type_intervention" class="form-select form-select-solid fw-bolder">
                 @foreach ($type_intervention as $type_interventionId => $libelle)
            <option value="{{ $type_interventionId }}" {{ $type_interventionId == $ticket->type_intervention ? 'selected' : '' }}>
                {{ $libelle }}
            </option>
        @endforeach
            </select>

														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">statut</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="raison sociale"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															
															<select name="statut" class="form-select form-select-solid fw-bolder">
                         @foreach ($statut as $statutId => $libelle)
            <option value="{{ $statutId }}" {{ $statutId == $ticket->statut ? 'selected' : '' }}>
                {{ $libelle }}
            </option>
        @endforeach
            </select>
															</div>
	 
														<!--end::Input group-->
														<!--begin::Billing toggle-->
																									<div class="modal-footer flex-center">
													<!--begin::Button-->
												<a href="/tickets"class="btn btn-light me-3"id="kt_modal_add_customer_cancel">	cancel
													</a>
                                                    <!--end::Button-->
													<!--begin::Button-->
													<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
														<span class="indicator-label">modifier</span>
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
