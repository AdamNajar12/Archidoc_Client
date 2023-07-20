@extends('layouts.dashboard_Admin')
@section('main')
<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
											<form class="form" action="{{ route('ticket.store') }}" method="POST" >
												    @csrf
                                                <!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_add_customer_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Traiter Ticket </h2>
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
															<label class="required fs-6 fw-bold mb-2">Type d intervention </label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="type_intervention" class="form-select form-select-solid fw-bolder">
                @foreach ($type_interventions as $type_intervention)
                    <option value="{{ $type_intervention->id }}">{{ $type_intervention->libelle }}</option>
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
                @foreach ($statuts as $statut)
                    <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>
                @endforeach
            </select>
															</div>
	
														<!--end::Input group-->
														<!--begin::Input group-->
														
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">date de demande  </label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="date" class="form-control form-control-solid" placeholder="" name="date_demande" id="date_demande" required="required"/>
															 
														</div>
                                                     
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">description </label>
															<!--end::Label-->
															<!--begin::Input-->
															<textarea  class="form-control form-control-solid" placeholder="" name="description" id="description" required="required" ></textarea>
															<!--end::Input-->
														</div>
                                                        <div class="fv-row mb-15">
															<!--begin::Label-->
															<label class="fs-6 fw-bold mb-2">vis à vis </label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="" name="vis_a_vis" id="vis_a_vis" required="required"/>
															<!--end::Input-->
														</div>
                                                        	<div class="d-flex flex-column mb-7 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span class="required">code client</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Application utilisée"></i>
																</label>
                                                          	<select name="client_id" id="client_id" class="form-select form-select-solid fw-bolder">
																  @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->code_client }}</option>
        @endforeach	
                                                            </select>
                                                             </div>
															 <div class="d-flex flex-column mb-7 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span class="required">Application</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Application utilisée"></i>
																</label>
                                                          	<select name="application_id"id="application_id" class="form-select form-select-solid fw-bolder">
																  @foreach ($applications as $application)
            <option value="{{ $application->id }}">{{ $application->libelle }}</option>
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
														<span class="indicator-label">Creer</span>
													</button>
													<!--end::Button-->
												</div>
												<!--end::Modal footer-->
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Écouteur d'événement pour le changement de sélection du client
        $('select[name="client_id"]').on('change', function () {
            var clientId = $(this).val();
            // Effectuer une requête AJAX pour récupérer les applications associées au client sélectionné
            $.ajax({
                url: '/get-applications/' + clientId, // Remplacez cette URL par celle qui pointe vers la route qui récupère les applications
                method: 'GET',
                success: function (data) {
                    // Supprimer toutes les options actuelles du select des applications
                    $('select[name="application_id"]').empty();

                    // Ajouter les nouvelles options récupérées depuis la réponse AJAX
                    data.forEach(function (application) {
                        $('select[name="application_id"]').append('<option value="' + application.id + '">' + application.libelle + '</option>');
                    });
                },
                error: function (error) {
                    // En cas d'erreur, afficher un message d'erreur ou gérer l'erreur comme vous le souhaitez
                    console.error(error);
                }
            });
        });
    });
</script>










@endsection
