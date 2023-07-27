@extends('layouts.frontdash')
@section('main')
<div class="card" >
									<!--begin::Body-->
									<div class="card-body">
										<!--begin::Row-->
										<div class="row mb-8">
											<!--begin::Col-->
											<div class="col-md-6 pe-lg-10">
												<!--begin::Form-->
												<form action="{{ route('ticket.storefront') }}" class="form" method="POST" enctype="multipart/form-data">
												    @csrf
                                                	<h1 class="fw-bolder text-dark mb-9">Traiter Ticket</h1>
													<!--begin::Input group-->
													<div class="row mb-5">
														<!--begin::Col-->
													 <div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="fs-5 fw-bold mb-2">Type d intervention</label>
																		<select name="type_intervention" class="form-select form-select-solid fw-bolder">
                                                     @foreach ($type_interventions as $type_intervention)
                                                     <option value="{{ $type_intervention->id }}">{{ $type_intervention->libelle }}</option>
                                                      @endforeach
                                                                          </select>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<!--end::Label-->
															<label class="fs-5 fw-bold mb-2">Staut </label>
																		<select name="statut" class="form-select form-select-solid fw-bolder">
                @foreach ($statuts as $statut)
                    <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>
                @endforeach
            </select>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-5 fv-row">
														<!--begin::Label-->
														<label class="fs-5 fw-bold mb-2">date demandé</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="date" class="form-control form-control-solid" placeholder="" name="date_demande" id="date_demande" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-10 fv-row">
														<label class="fs-6 fw-bold mb-2">Description</label>
														<textarea class="form-control form-control-solid" rows="6" name="description" id="description" placeholder=""></textarea>
													</div>
                                                    <div class="d-flex flex-column mb-10 fv-row">
														<label class="fs-6 fw-bold mb-2">vis à vis </label>
														<textarea class="form-control form-control-solid" rows="6" name="vis_a_vis" id="vis_a_vis" placeholder=""></textarea>
													</div>
													<div class="col-md-6 fv-row">
															<!--end::Label-->
															<label class="fs-5 fw-bold mb-2">Code Client </label>
					<select name="client_id" id="client_id" class="form-select form-select-solid fw-bolder">
																  @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->code_client }}</option>
        @endforeach	
                                                            </select>
               
														</div>
                                                        <div class="col-md-6 fv-row">
															<!--end::Label-->
															<label class="fs-5 fw-bold mb-2">Application     </label>
					<select name="application_id"id="application_id" class="form-select form-select-solid fw-bolder">
																  @foreach ($applications as $application)
            <option value="{{ $application->id }}">{{ $application->libelle }}</option>
        @endforeach	
                                                            </select>
               
														</div>
                                                        <br>
                                                          <div class="col-md-6 fv-row">
                                                         <label class="fs-5 fw-bold mb-2">Fichier    </label>
                                                             <input type="file" name="nom_fichier[]" id="nom_fichier" class="form-control form-control-solid" multiple />
                                                          </div>
                                                        <br>
                                                          <div class="col-md-6 fv-row">
                                                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
														<span class="indicator-label">Creer</span>
													</button>
                                                    </div>
												</form>
												<!--end::Form-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 ps-lg-10">
												<!--begin::Map-->
												<div id="map" style="height: 800px;"  class="w-100 rounded mb-2 mb-lg-0 mt-2" ></div>

												<!--end::Map-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row g-5 mb-5 mb-lg-15">
											<!--begin::Col-->
											<div class="col-sm-6 pe-lg-10">
												<!--begin::Phone-->
												<div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
													<!--begin::Icon-->
													<!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<h1 class="text-dark fw-bolder my-5">Let’s Speak</h1>
													<!--end::Subtitle-->
													<!--begin::Number-->
													<div class="text-gray-700 fw-bold fs-2">+216 70687109</div>
													<!--end::Number-->
												</div>
												<!--end::Phone-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-sm-6 ps-lg-10">
												<!--begin::Address-->
												<div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
													<span class="svg-icon svg-icon-3tx svg-icon-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
															<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<h1 class="text-dark fw-bolder my-5">Our Head Office</h1>
													<!--end::Subtitle-->
													<!--begin::Description-->
													<div class="text-gray-700 fs-3 fw-bold">V5XR+FPJ، Zone Industrielle Chotrana II - Cité El Ghazala Ariana, Cebalat</div>
													<!--end::Description-->
												</div>
												<!--end::Address-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Card-->
										<div class="card mb-4 bg-light text-center">
											<!--begin::Body-->
											<div class="card-body py-12">
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="assets/media/svg/brand-logos/github.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="assets/media/svg/brand-logos/behance.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="assets/media/svg/brand-logos/pinterest-p.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a href="#" class="mx-4">
													<img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-30px my-2" alt="" />
												</a>
												<!--end::Icon-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Body-->
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
<script>
      var latitude = 36.8985088;
        var longitude = 10.1918423;

        // Initialiser la carte
        var map = L.map('map').setView([latitude, longitude], 15);

        // Ajouter une couche de tuiles OpenStreetMap avec attribution
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter un marqueur personnalisé
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Votre emplacement personnalisé !')
            .openPopup();
</script>

@endsection