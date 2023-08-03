@extends('layouts.dashboard_Admin')
@section('main')
<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
<form class="form" action="{{ route('ticket.update', $ticket->id) }}" method="POST"  enctype="multipart/form-data" >
												    @csrf
                                                   @method('PUT')
                                           
												<!--end::Modal header-->
												<div class="modal-header" id="kt_modal_add_customer_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Traiter Ticket</h2>
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
												<!--begin::Modal body-->
												<div class="modal-body py-10 px-lg-17">
													<!--begin::Scroll-->
													<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
														<!--begin::Input group-->
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">Code client</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="code_client"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
														   <div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
															<span>{{$client->code_client}}</span>
															
														</div>
														<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">Application</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="code_client"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
														   <div class="d-flex flex-column">
														<div class="d-flex justify-content-between w-100 fs-4 fw-bolder mb-3">
														@foreach ($applications as $application)
    <span>{{ $application->libelle }}</span>
@endforeach
															
														</div>
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
															<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">date demandé</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="raison sociale"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="date" class="form-control form-control-solid" placeholder="" name="date_demande" id="date_demande" value="{{ $ticket->date_demande }}" />
												
															</div>
	                                                      <div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">description</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="description"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="description" id="description" value="{{ $ticket->description }}" />
												
															</div>
															<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">vis à vis</span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="vis_a_vis"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="vis_a_vis" id="vis_a_vis" value="{{ $ticket->vis_a_vis }}" />
												
															</div>
															
														 <div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">Observation </span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Observation"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															 <textarea class="form-control form-control-solid" placeholder="" name="Observation" id="Observation">{{ $ticket->traitement->Observation }}</textarea>
												
															</div>
													     </div>
													      <div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">Fichier</span>
																
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="file" name="nom_fichier[]" id="nom_fichier" class="form-control form-control-solid" multiple />
												
															</div>
													     </div>
												<div class="fv-row mb-7">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">
																<span class="required">Ajouter un autre Utilisateur Pour cette Ticket  </span>
																<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Observation"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="users[]" class="form-select form-select-solid fw-bolder" multiple>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->prenom }}</option>
                @endforeach
            </select>
												
															</div>
													     </div>
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
