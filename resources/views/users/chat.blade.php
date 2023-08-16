@extends('layouts.frontdash')
@section('main')

						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-lg-row">
									<!--begin::Sidebar-->
									<div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
										<!--begin::Contacts-->
										<div class="card card-flush">
											<!--begin::Card header-->
											<div class="card-header pt-7" id="kt_chat_contacts_header">
												<!--begin::Form-->
												<form id="message-form" class="w-100 position-relative" autocomplete="off">
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Input-->
													<input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by username or email..." />
													<!--end::Input-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-5" id="kt_chat_contacts_body">
												<!--begin::List-->
												<div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px">
													<!--begin::User-->
													
													<!--end::User-->
													<!--begin::Separator-->
													<div class="separator separator-dashed d-none"></div>
													<!--end::Separator-->
													<!--begin::User-->
													  @foreach($users as $user )
                                                    <div class="d-flex flex-stack py-4">
														<!--begin::Details-->
														<div class="d-flex align-items-center">
															<!--begin::Avatar-->
															<div class="symbol symbol-45px symbol-circle">
																@if($user->image)
                                                                <img alt="Pic" src="{{ asset('storage/user_image/' . $user->image->nom_image) }}" />
                                                                @else
                                                                    <img alt="Pic" src="{{ asset('frontend/media/avatars/blank.png') }}" />
                                                                @endif
															</div>
															<!--end::Avatar-->
															<!--begin::Details-->
															<div class="ms-5">
																<a href="{{ route('users.chat', $user->id) }}" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{$user->prenom}}{{$user->nom}}</a>
																<div class="fw-bold text-muted">{{$user->email}}</div>
															</div>
															<!--end::Details-->
														</div>
														<!--end::Details-->
														<!--begin::Lat seen-->
														
														<!--end::Lat seen-->
													</div>
													<!--end::User-->
													<!--begin::Separator-->
													<div class="separator separator-dashed d-none"></div>
                                                    @endforeach
													<!--end::Separator-->
													<!--begin::User-->
													
													<!--end::User-->
												</div>
												<!--end::List-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Contacts-->
									</div>
									<!--end::Sidebar-->
									<!--begin::Content-->
                                    @if(isset($receiver))
									<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
										<!--begin::Messenger-->
										<div class="card" id="kt_chat_messenger">
											<!--begin::Card header-->
											<div class="card-header" id="kt_chat_messenger_header">
												<!--begin::Title-->
												<div class="card-title">
													<!--begin::User-->
                                                     
													<div class="d-flex justify-content-center flex-column me-3">
														<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1"> {{ $receiver->prenom }}{{ $receiver->nom }}</a>
														<!--begin::Info-->
														<div class="mb-0 lh-1">
															<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
															<span class="fs-7 fw-bold text-muted">Active</span>
														</div>
														<!--end::Info-->
													</div>
                                                    
													<!--end::User-->
												</div>
												<!--end::Title-->
												<!--begin::Card toolbar-->
												
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											 <div class="card-body" id="kt_chat_messenger_body">
    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px">
        @php
            $previousSender = null;
        @endphp

        @foreach($messages as $message)
            @php
                $isCurrentUser = ($message->sender_id == auth()->id());
            @endphp

            @if($message->sender_id != $previousSender)
                <div class="d-flex justify-content-{{ $isCurrentUser ? 'end' : 'start' }} mb-10 message-container">
                    <div class="d-flex flex-column align-items-{{ $isCurrentUser ? 'end' : 'start' }}">
                        <div class="d-flex align-items-center mb-2">
                            @if($isCurrentUser)
                                <div class="me-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                    @if(auth()->user()->image)
                                        <img alt="Pic" src="{{ asset('storage/user_image/' . auth()->user()->image->nom_image) }}" />
                                    @else
                                        <img alt="Pic" src="{{ asset('frontend/media/avatars/blank.png') }}" />
                                    @endif
                                </div>
                            @else
                                <div class="symbol symbol-35px symbol-circle">
                                    @if($receiver->image)
                                        <img alt="Pic" src="{{ asset('storage/user_image/' . $receiver->image->nom_image) }}" />
                                    @else
                                        <img alt="Pic" src="{{ asset('frontend/media/avatars/blank.png') }}" />
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{ $receiver->prenom }} {{ $receiver->nom }}</a>
                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-5 rounded bg-light-{{ $isCurrentUser ? 'primary' : 'info' }} text-dark fw-bold mw-lg-400px text-{{ $isCurrentUser ? 'end' : 'start' }}" data-kt-element="message-text">{{ $message->content }}</div>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-{{ $isCurrentUser ? 'end' : 'start' }} mb-10 message-container">
                    <div class="d-flex flex-column align-items-{{ $isCurrentUser ? 'end' : 'start' }}">
                        <div class="p-5 rounded bg-light-{{ $isCurrentUser ? 'primary' : 'info' }} text-dark fw-bold mw-lg-400px text-{{ $isCurrentUser ? 'end' : 'start' }}" data-kt-element="message-text">{{ $message->content }}</div>
                    </div>
                </div>
            @endif

            @php
                $previousSender = $message->sender_id;
            @endphp
        @endforeach
    </div>
</div>

                                             @else
                                             <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
										<!--begin::Messenger-->
										<div class="card" id="kt_chat_messenger">
											<!--begin::Card header-->
											<div class="card-header" id="kt_chat_messenger_header">
												<!--begin::Title-->
												<div class="card-title">
													<!--begin::User-->
                                                     
													<div class="d-flex justify-content-center flex-column me-3">
														<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1"> </a>
														<!--begin::Info-->
														<div class="mb-0 lh-1">
															<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
															<span class="fs-7 fw-bold text-muted">Active</span>
														</div>
														<!--end::Info-->
													</div>
                                                    
													<!--end::User-->
												</div>
												<!--end::Title-->
												<!--begin::Card toolbar-->
												
												<!--end::Card toolbar-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body" id="kt_chat_messenger_body">
												<!--begin::Messages-->
												<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px">
													<!--begin::Message(in)-->
													<div class="d-flex justify-content-start mb-10">
														<!--begin::Wrapper-->
														<div class="d-flex flex-column align-items-start">
															<!--begin::User-->
															<div class="d-flex align-items-center mb-2">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
                                                                
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-3">
																	<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"> </a>
																	<span class="text-muted fs-7 mb-1">2 mins</span>
																</div>
																<!--end::Details-->
															</div>
															<!--end::User-->
															<!--begin::Text-->
                                                            
                                                            <!--end::Text-->
                                                            
                                                           
														</div>
														<!--end::Wrapper-->
													</div>
                                                   
													<!--end::Message(in)-->
													<!--begin::Message(out)-->
													<div class="d-flex justify-content-end mb-10">
														<!--begin::Wrapper-->
														<div class="d-flex flex-column align-items-end">
															<!--begin::User-->
															<div class="d-flex align-items-center mb-2">
																<!--begin::Details-->
																<div class="me-3">
																	
																	<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
																</div>
																<!--end::Details-->
																<!--begin::Avatar-->
																
																<!--end::Avatar-->
															</div>
															<!--end::User-->
															<!--begin::Text-->
                                                            
                                                            <!--end::Text-->

														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Message(out)-->
													<!--begin::Message(in)-->
													
													<!--end::Message(out)-->
													<!--begin::Message(in)-->
													
													<!--end::Message(out)-->
													<!--begin::Message(in)-->
													
													<!--end::Message(template for out)-->
													<!--begin::Message(template for in)-->
													
													<!--end::Message(template for in)-->
												</div>
												<!--end::Messages-->
											</div>
                                                     @endif
											<!--end::Card body-->
											<!--begin::Card footer-->
											<div class="card-footer pt-4" id="kt_chat_messenger_footer">
												<!--begin::Input-->
                                                 <form action="{{ route('users.send') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver ? $receiver->id : '' }}">
        <textarea class="form-control form-control-flush mb-3" id="content" name="content" placeholder="Type a message"></textarea>
        <!--end::Input-->
        <!--begin:Toolbar-->
        <div class="d-flex flex-stack">
            <!--begin::Send-->
            <button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
            <!--end::Send-->
        </div>
        <!--end::Toolbar-->
    </form>
												</div>
												<!--end::Toolbar-->
											</div>
                                            
											<!--end::Card footer-->
										</div>
										<!--end::Messenger-->
									</div>
									<!--end::Content-->
								</div>
								<!--end::Layout-->
								<!--begin::Modals-->
								<!--begin::Modal - View Users-->
								<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header pb-0 border-0 justify-content-end">
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
											<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
												<!--begin::Heading-->
												<div class="text-center mb-13">
													<!--begin::Title-->
													<h1 class="mb-3">Browse Users</h1>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="text-muted fw-bold fs-5">If you need more info, please check out our
													<a href="#" class="link-primary fw-bolder">Users Directory</a>.</div>
													<!--end::Description-->
												</div>
												<!--end::Heading-->
												<!--begin::Users-->
												<div class="mb-15">
													<!--begin::List-->
													<div class="mh-375px scroll-y me-n7 pe-7">
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma Smith
																	<span class="badge badge-light fs-8 fw-bold ms-2">Art Director</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$23,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Melody Macy
																	<span class="badge badge-light fs-8 fw-bold ms-2">Marketing Analytic</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">melody@altbox.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$50,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Max Smith
																	<span class="badge badge-light fs-8 fw-bold ms-2">Software Enginer</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">max@kt.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$75,900</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-4.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Sean Bean
																	<span class="badge badge-light fs-8 fw-bold ms-2">Web Developer</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">sean@dellito.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$10,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Brian Cox
																	<span class="badge badge-light fs-8 fw-bold ms-2">UI/UX Designer</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">brian@exchange.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$20,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Mikaela Collins
																	<span class="badge badge-light fs-8 fw-bold ms-2">Head Of Marketing</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">mikaela@pexcom.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$9,300</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-8.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Francis Mitcham
																	<span class="badge badge-light fs-8 fw-bold ms-2">Software Arcitect</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">f.mitcham@kpmg.com.au</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$15,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Olivia Wild
																	<span class="badge badge-light fs-8 fw-bold ms-2">System Admin</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">olivia@corpmail.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$23,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Neil Owen
																	<span class="badge badge-light fs-8 fw-bold ms-2">Account Manager</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">owen.neil@gmail.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$45,800</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-6.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Dan Wilson
																	<span class="badge badge-light fs-8 fw-bold ms-2">Web Desinger</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">dam@consilting.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$90,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma Bold
																	<span class="badge badge-light fs-8 fw-bold ms-2">Corporate Finance</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">emma@intenso.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$5,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="assets/media/avatars/150-7.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Ana Crown
																	<span class="badge badge-light fs-8 fw-bold ms-2">Customer Relationship</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">ana.cf@limtel.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$70,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-info text-info fw-bold">A</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Robert Doe
																	<span class="badge badge-light fs-8 fw-bold ms-2">Marketing Executive</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">robert@benko.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$45,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
													</div>
													<!--end::List-->
												</div>
												<!--end::Users-->
												<!--begin::Notice-->
												<div class="d-flex justify-content-between">
													<!--begin::Label-->
													<div class="fw-bold">
														<label class="fs-6">Adding Users by Team Members</label>
														<div class="fs-7 text-muted">If you need more info, please check budget planning</div>
													</div>
													<!--end::Label-->
													<!--begin::Switch-->
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="" checked="checked" />
														<span class="form-check-label fw-bold text-muted">Allowed</span>
													</label>
													<!--end::Switch-->
												</div>
												<!--end::Notice-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - View Users-->
								<!--begin::Modal - Users Search-->
								<div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header pb-0 border-0 justify-content-end">
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
											<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
												<!--begin::Content-->
												<div class="text-center mb-13">
													<h1 class="mb-3">Search Users</h1>
													<div class="text-muted fw-bold fs-5">Invite Collaborators To Your Project</div>
												</div>
												<!--end::Content-->
												<!--begin::Search-->
												<div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
													<!--begin::Form-->
													<form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
														<!--begin::Hidden input(Added to disable form autocomplete)-->
														<input type="hidden" />
														<!--end::Hidden input-->
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input" />
														<!--end::Input-->
														<!--begin::Spinner-->
														<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
															<span class="spinner-border h-15px w-15px align-middle text-muted"></span>
														</span>
														<!--end::Spinner-->
														<!--begin::Reset-->
														<span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
															<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
														<!--end::Reset-->
													</form>
													<!--end::Form-->
													<!--begin::Wrapper-->
													<div class="py-5">
														<!--begin::Suggestions-->
														<div data-kt-search-element="suggestions">
															<!--begin::Heading-->
															<h3 class="fw-bold mb-5">Recently searched:</h3>
															<!--end::Heading-->
															<!--begin::Users-->
															<div class="mh-375px scroll-y me-n7 pe-7">
																<!--begin::User-->
																<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
																	<!--begin::Avatar-->
																	<div class="symbol symbol-35px symbol-circle me-5">
																		<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
																	</div>
																	<!--end::Avatar-->
																	<!--begin::Info-->
																	<div class="fw-bold">
																		<span class="fs-6 text-gray-800 me-2">Emma Smith</span>
																		<span class="badge badge-light">Art Director</span>
																	</div>
																	<!--end::Info-->
																</a>
																<!--end::User-->
																<!--begin::User-->
																<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
																	<!--begin::Avatar-->
																	<div class="symbol symbol-35px symbol-circle me-5">
																		<span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
																	</div>
																	<!--end::Avatar-->
																	<!--begin::Info-->
																	<div class="fw-bold">
																		<span class="fs-6 text-gray-800 me-2">Melody Macy</span>
																		<span class="badge badge-light">Marketing Analytic</span>
																	</div>
																	<!--end::Info-->
																</a>
																<!--end::User-->
																<!--begin::User-->
																<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
																	<!--begin::Avatar-->
																	<div class="symbol symbol-35px symbol-circle me-5">
																		<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
																	</div>
																	<!--end::Avatar-->
																	<!--begin::Info-->
																	<div class="fw-bold">
																		<span class="fs-6 text-gray-800 me-2">Max Smith</span>
																		<span class="badge badge-light">Software Enginer</span>
																	</div>
																	<!--end::Info-->
																</a>
																<!--end::User-->
																<!--begin::User-->
																<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
																	<!--begin::Avatar-->
																	<div class="symbol symbol-35px symbol-circle me-5">
																		<img alt="Pic" src="assets/media/avatars/150-4.jpg" />
																	</div>
																	<!--end::Avatar-->
																	<!--begin::Info-->
																	<div class="fw-bold">
																		<span class="fs-6 text-gray-800 me-2">Sean Bean</span>
																		<span class="badge badge-light">Web Developer</span>
																	</div>
																	<!--end::Info-->
																</a>
																<!--end::User-->
																<!--begin::User-->
																<a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
																	<!--begin::Avatar-->
																	<div class="symbol symbol-35px symbol-circle me-5">
																		<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
																	</div>
																	<!--end::Avatar-->
																	<!--begin::Info-->
																	<div class="fw-bold">
																		<span class="fs-6 text-gray-800 me-2">Brian Cox</span>
																		<span class="badge badge-light">UI/UX Designer</span>
																	</div>
																	<!--end::Info-->
																</a>
																<!--end::User-->
															</div>
															<!--end::Users-->
														</div>
														<!--end::Suggestions-->
														<!--begin::Results(add d-none to below element to hide the users list by default)-->
														<div data-kt-search-element="results" class="d-none">
															<!--begin::Users-->
															<div class="mh-375px scroll-y me-n7 pe-7">
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Smith</a>
																			<div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2" selected="selected">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody Macy</a>
																			<div class="fw-bold text-muted">melody@altbox.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1" selected="selected">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max Smith</a>
																			<div class="fw-bold text-muted">max@kt.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-4.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean Bean</a>
																			<div class="fw-bold text-muted">sean@dellito.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2" selected="selected">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian Cox</a>
																			<div class="fw-bold text-muted">brian@exchange.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
																			<div class="fw-bold text-muted">mikaela@pexcom.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2" selected="selected">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-8.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
																			<div class="fw-bold text-muted">f.mitcham@kpmg.com.au</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
																			<div class="fw-bold text-muted">olivia@corpmail.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2" selected="selected">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil Owen</a>
																			<div class="fw-bold text-muted">owen.neil@gmail.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1" selected="selected">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-6.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
																			<div class="fw-bold text-muted">dam@consilting.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Bold</a>
																			<div class="fw-bold text-muted">emma@intenso.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2" selected="selected">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-7.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana Crown</a>
																			<div class="fw-bold text-muted">ana.cf@limtel.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1" selected="selected">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-info text-info fw-bold">A</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert Doe</a>
																			<div class="fw-bold text-muted">robert@benko.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-17.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John Miller</a>
																			<div class="fw-bold text-muted">miller@mapple.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-light-success text-success fw-bold">L</span>
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
																			<div class="fw-bold text-muted">lucy.m@fentech.com</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2" selected="selected">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-10.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
																			<div class="fw-bold text-muted">ethan@loop.com.au</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1" selected="selected">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
																<!--begin::Separator-->
																<div class="border-bottom border-gray-300 border-bottom-dashed"></div>
																<!--end::Separator-->
																<!--begin::User-->
																<div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
																	<!--begin::Details-->
																	<div class="d-flex align-items-center">
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16" />
																		</label>
																		<!--end::Checkbox-->
																		<!--begin::Avatar-->
																		<div class="symbol symbol-35px symbol-circle">
																			<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
																		</div>
																		<!--end::Avatar-->
																		<!--begin::Details-->
																		<div class="ms-5">
																			<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Smith</a>
																			<div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
																		</div>
																		<!--end::Details-->
																	</div>
																	<!--end::Details-->
																	<!--begin::Access menu-->
																	<div class="ms-2 w-100px">
																		<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
																			<option value="1">Guest</option>
																			<option value="2">Owner</option>
																			<option value="3" selected="selected">Can Edit</option>
																		</select>
																	</div>
																	<!--end::Access menu-->
																</div>
																<!--end::User-->
															</div>
															<!--end::Users-->
															<!--begin::Actions-->
															<div class="d-flex flex-center mt-15">
																<button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
																<button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Add Selected Users</button>
															</div>
															<!--end::Actions-->
														</div>
														<!--end::Results-->
														<!--begin::Empty-->
														<div data-kt-search-element="empty" class="text-center d-none">
															<!--begin::Message-->
															<div class="fw-bold py-10">
																<div class="text-gray-600 fs-3 mb-2">No users found</div>
																<div class="text-muted fs-6">Try to search by username, full name or email...</div>
															</div>
															<!--end::Message-->
															<!--begin::Illustration-->
															<div class="text-center px-5">
																<img src="assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px" />
															</div>
															<!--end::Illustration-->
														</div>
														<!--end::Empty-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Search-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - Users Search-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                           <script>
        $(document).ready(function () {
            // Récupérer tous les éléments de message
            const messageElements = $('[data-kt-element="message-text"]');
            
            // Masquer tous les éléments de message
            messageElements.hide();
            
            // Afficher les éléments de message un par un avec un délai
            let delay = 0;
            messageElements.each(function () {
                const messageElement = $(this);
                setTimeout(function () {
                    messageElement.show();
                }, delay);
                delay += 1000; // Ajouter 1 seconde de délai
            });
        });
    </script>




                        @endsection