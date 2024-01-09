@extends('layouts.channel.app')

@section('page_css')
@endsection

@section('content')
	<div class="card border">
		<div class="card-header d-flex justify-content-between align-items-center">
			<div class="font-weight-bold" style="font-size: 16px;">MOVIES</div>
			<div>
				<button class="btn btn-primary rounded-sm" data-toggle="modal" data-target="#create-modal">
					Create New
					<i class="fas fa-plus ml-1"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<table class="table datatables table-hover mb-0"></table>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Create Modal -->
	<div class="modal fade" id="create-modal">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<form id="create-modal-form">
					<div class="modal-header">
						<h5 class="modal-title">Create Record</h5>
						<button class="btn btn-default btn-sm" data-dismiss="modal">
							<i class="fas fa-times fa-lg"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<fieldset class="mb-3">
									<label class="form-label">{{ __('Autofill from IMDB') }}</label>
									<div class="d-flex justify-content-between">
										<input type="text" class="form-control mr-3" name="imdb_title"
										       placeholder="Enter Title ID (e.g. tt1582350)">
										<button type="button" class="btn-fetch btn btn-primary">Fetch</button>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="mb-4">
									<h6 class="mb-3">Genres & Languages</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Genres') }}</label>
										<select class="form-control select-select2 genres" name="genres[]"
										        required></select>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Languages') }}</label>
										<select class="form-control select-select2 languages" name="languages[]"
										        required></select>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">BASIC DETAILS</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Title') }}</label>
										<input type="text" class="form-control" name="title" required>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Description') }}</label>
										<textarea class="form-control" rows="5" name="description" required></textarea>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Actors') }}</label>
										<select class="form-control select-select2 actors" name="actors[]"></select>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Directors') }}</label>
										<select class="form-control select-select2 directors"
										        name="directors[]"></select>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('IMDB Rating') }}</label>
										<input type="text" class="form-control" name="imdb_rating" required>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Content/Maturity Rating') }}</label>
										<input type="text" class="form-control" name="content_rating" placeholder="18" required>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Release Date') }}</label>
										<input type="date" class="form-control" name="release_date" required>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">SEO</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Meta Title') }}</label>
										<input type="text" class="form-control" name="meta_title">
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Meta Description') }}</label>
										<textarea class="form-control" rows="5" name="meta_description"></textarea>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Meta Keywords (comma separated)') }}</label>
										<input type="text" class="form-control" name="meta_keywords">
									</fieldset>
								</section>
							</div>
							<div class="col">
								<section class="mb-4">
									<h6 class="mb-3">POSTER</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Poster') }}</label>
										<input type="hidden" name="poster" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="image"
											       id="choose-poster">
											<label class="custom-file-label text-truncate" for="choose-poster">Choose media</label>
										</div>
										<div class="preview"></div>
									</fieldset>
								</section>

								<section class="mb-4">
									<h6 class="mb-3">TRAILER</h6>
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Trailer') }}</label>
										<input type="hidden" name="trailer" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
												   id="choose-trailer">
											<label class="custom-file-label text-truncate" for="choose-trailer">Choose media</label>
										</div>
									</fieldset>
								</section>

								<section class="mb-4">
									<h6 class="mb-3">VIDEOS</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 1080p') }}</label>
										<input type="hidden" name="videos[1080p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video1080">
											<label class="custom-file-label text-truncate" for="choose-video1080">Choose media</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 720p') }}</label>
										<input type="hidden" name="videos[720p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video720">
											<label class="custom-file-label text-truncate" for="choose-video720">Choose media</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 480p') }}</label>
										<input type="hidden" name="videos[480p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video480p">
											<label class="custom-file-label text-truncate" for="choose-video480p">Choose media</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 360p') }}</label>
										<input type="hidden" name="videos[360p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video360">
											<label class="custom-file-label text-truncate" for="choose-video360">Choose media</label>
										</div>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">SUBTITLES</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Subtitle 1') }}</label>
										<input type="hidden" name="subtitles_data[0]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media"
											       data-type="subtitle" id="choose-subtitle1">
											<label class="custom-file-label text-truncate" for="choose-subtitle1">
												Choose media
											</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Subtitle 2') }}</label>
										<input type="hidden" name="subtitles_data[1]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media"
											       data-type="subtitle" id="choose-subtitle2">
											<label class="custom-file-label text-truncate" for="choose-subtitle2">
												Choose media
											</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Subtitle 3') }}</label>
										<input type="hidden" name="subtitles_data[2]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media"
											       data-type="subtitle" id="choose-subtitle3">
											<label class="custom-file-label text-truncate" for="choose-subtitle3">
												Choose media
											</label>
										</div>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">OPTIONS</h6>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="download"
										       name="download"
										       value="1">
										<label class="custom-control-label" for="download">Downloadable?</label>
									</fieldset>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="subtitles"
										       name="subtitles"
										       value="1">
										<label class="custom-control-label" for="subtitles">Subtitles?</label>
									</fieldset>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="upcoming"
										       name="upcoming"
										       value="1">
										<label class="custom-control-label" for="upcoming">Upcoming?</label>
									</fieldset>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="premium"
										       name="premium"
										       value="1">
										<label class="custom-control-label" for="premium">Premium?</label>
									</fieldset>
								</section>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">
							<i class="fas fa-plus mr-1"></i>
							Create
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- Edit Modal -->
	<div class="modal fade" id="edit-modal">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<form id="edit-modal-form">
					@method('PUT')
					
					<div class="modal-header">
						<h5 class="modal-title">Create Record</h5>
						<button class="btn btn-default btn-sm" data-dismiss="modal">
							<i class="fas fa-times fa-lg"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<fieldset class="mb-3">
									<label class="form-label">{{ __('Autofill from IMDB') }}</label>
									<div class="d-flex justify-content-between">
										<input type="text" class="form-control mr-3" name="imdb_title"
										       placeholder="Enter Title ID (e.g. tt1582350)">
										<button type="button" class="btn-fetch btn btn-primary">Fetch</button>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<section class="mb-4">
									<h6 class="mb-3">Genres & Languages</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Genres') }}</label>
										<select class="form-control select-select2 genres" name="genres[]"
										        required></select>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Languages') }}</label>
										<select class="form-control select-select2 languages" name="languages[]"
										        required></select>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">BASIC DETAILS</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Title') }}</label>
										<input type="text" class="form-control" name="title" required>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Description') }}</label>
										<textarea class="form-control" rows="5" name="description" required></textarea>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Actors') }}</label>
										<select class="form-control select-select2 actors" name="actors[]"></select>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Directors') }}</label>
										<select class="form-control select-select2 directors"
										        name="directors[]"></select>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('IMDB Rating') }}</label>
										<input type="text" class="form-control" name="imdb_rating" required>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Content/Maturity Rating') }}</label>
										<input type="text" class="form-control" name="content_rating" placeholder="18" required>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Release Date') }}</label>
										<input type="date" class="form-control" name="release_date" required>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">SEO</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Meta Title') }}</label>
										<input type="text" class="form-control" name="meta_title">
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Meta Description') }}</label>
										<textarea class="form-control" rows="5" name="meta_description"></textarea>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Meta Keywords (comma separated)') }}</label>
										<input type="text" class="form-control" name="meta_keywords">
									</fieldset>
								</section>
							</div>
							<div class="col">
								<section class="mb-4">
									<h6 class="mb-3">POSTER</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Poster') }}</label>
										<input type="hidden" name="poster" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="image"
											       id="choose-poster">
											<label class="custom-file-label text-truncate" for="choose-poster">Choose media</label>
										</div>
										<div class="preview"></div>
									</fieldset>
								</section>

								<section class="mb-4">
									<h6 class="mb-3">TRAILER</h6>
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Trailer') }}</label>
										<input type="hidden" name="trailer" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
												   id="choose-trailer">
											<label class="custom-file-label text-truncate" for="choose-trailer">Choose media</label>
										</div>
									</fieldset>
								</section>

								<section class="mb-4">
									<h6 class="mb-3">VIDEOS</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 1080p') }}</label>
										<input type="hidden" name="videos[1080p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video1080">
											<label class="custom-file-label text-truncate" for="choose-video1080">Choose media</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 720p') }}</label>
										<input type="hidden" name="videos[720p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video720">
											<label class="custom-file-label text-truncate" for="choose-video720">Choose media</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 480p') }}</label>
										<input type="hidden" name="videos[480p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video480p">
											<label class="custom-file-label text-truncate" for="choose-video480p">Choose media</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Video 360p') }}</label>
										<input type="hidden" name="videos[360p]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media" data-type="video"
											       id="choose-video360">
											<label class="custom-file-label text-truncate" for="choose-video360">Choose media</label>
										</div>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">SUBTITLES</h6>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Subtitle 1') }}</label>
										<input type="hidden" name="subtitles_data[0]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media"
											       data-type="subtitle" id="choose-subtitle1">
											<label class="custom-file-label text-truncate" for="choose-subtitle1">
												Choose media
											</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Subtitle 2') }}</label>
										<input type="hidden" name="subtitles_data[1]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media"
											       data-type="subtitle" id="choose-subtitle2">
											<label class="custom-file-label text-truncate" for="choose-subtitle2">
												Choose media
											</label>
										</div>
									</fieldset>
									
									<fieldset class="mb-3">
										<label class="form-label">{{ __('Subtitle 3') }}</label>
										<input type="hidden" name="subtitles_data[2]" required>
										<div class="custom-file">
											<input type="file" class="custom-file-input choose-media"
											       data-type="subtitle" id="choose-subtitle3">
											<label class="custom-file-label text-truncate" for="choose-subtitle3">
												Choose media
											</label>
										</div>
									</fieldset>
								</section>
								
								<section class="mb-4">
									<h6 class="mb-3">OPTIONS</h6>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="download_"
										       name="download"
										       value="1">
										<label class="custom-control-label" for="download_">Downloadable?</label>
									</fieldset>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="subtitles_"
										       name="subtitles"
										       value="1">
										<label class="custom-control-label" for="subtitles_">Subtitles?</label>
									</fieldset>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="upcoming_"
										       name="upcoming"
										       value="1">
										<label class="custom-control-label" for="upcoming_">Upcoming?</label>
									</fieldset>
									
									<fieldset class="custom-control custom-switch mb-3" style="line-height: 130%;">
										<input type="checkbox" class="custom-control-input" id="premium_"
										       name="premium"
										       value="1">
										<label class="custom-control-label" for="premium_">Premium?</label>
									</fieldset>
								</section>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-check mr-1"></i>Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script>
        $(window).on('load', function () {
            $('.select-select2.genres').select2({
                theme: 'bootstrap4',
                multiple: true,
                width: '100%',
                placeholder: 'Please select option',
                ajax: {
                    url: '{{ route('pagination.genres') }}',
                    delay: 250,
                    dataType: 'json',
                    processResults: function (response) {
                        return {
                            results: response.data,
                            pagination: {
                                more: response.current_page < response.total
                            }
                        };
                    }
                }
            });

            $('.select-select2.languages').select2({
                theme: 'bootstrap4',
                multiple: true,
                width: '100%',
                placeholder: 'Please select option',
                ajax: {
                    url: '{{ route('pagination.languages') }}',
                    delay: 250,
                    dataType: 'json',
                    processResults: function (response) {
                        return {
                            results: response.data,
                            pagination: {
                                more: response.current_page < response.total
                            }
                        };
                    }
                }
            });

            $('.select-select2.actors').select2({
                theme: 'bootstrap4',
                multiple: true,
                tags: true,
                width: '100%',
                placeholder: 'Please select option',
            });

            $('.select-select2.directors').select2({
                theme: 'bootstrap4',
                multiple: true,
                tags: true,
                width: '100%',
                placeholder: 'Please select option',
            });

            $('.btn-fetch').on('click', (e) => {
                const btn = $(e.currentTarget);
                const form = btn.parents('form');
                const title = form.find('[name="imdb_title"]').val();

                if (title) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: "POST",
                        dataType: 'json',
                        url: '{{ route('imdb.fetch.title') }}',
                        data: {title: title},
                        beforeSend: function () {
                            btn.addClass('disabled').prop('disabled', true);
                            btn.html('<i class="fas fa-spinner fa-pulse"></i>');
                        },
                        success: function (response) {
                            btn.removeClass('disabled').prop('disabled', false);
                            btn.html('Fetch');

                            if (response.status) {
                                $('.select-select2').empty()

                                // Genres
                                $.each(response.data.genres, (i, item) => {
                                    const option = new Option(item.name, item.id, true, true);
                                    form.find('.select-select2.genres').append(option).trigger('change');
                                });

                                // Languages
                                $.each(response.data.languages, (i, item) => {
                                    const option = new Option(item.title, item.id, true, true);
                                    form.find('.select-select2.languages').append(option).trigger('change');
                                });

                                form.find('[name="title"]').val(response.data.title);
                                form.find('[name="description"]').val(response.data.description);

                                // Actors
                                $.each(response.data.actors, (i, item) => {
                                    const option = new Option(item.name, item.name, true, true);
                                    form.find('.select-select2.actors').append(option).trigger('change');
                                });

                                // Directors
                                $.each(response.data.directors, (i, item) => {
                                    const option = new Option(item.name, item.name, true, true);
                                    form.find('.select-select2.directors').append(option).trigger('change');
                                });

                                form.find('[name="imdb_rating"]').val(response.data.imdb_rating);
                                form.find('[name="release_date"]').val(response.data.release_date);

                                const poster = form.find('[name="poster"]');
                                poster.val(response.data.poster.id);
                                poster.parent().find('.choose-media').next().text(response.data.poster.title);
                                poster.parent().find('.preview').html('<img class="img-thumbnail img-fluid mt-1" src="' + config.storage + response.data.poster.path + '">');
                            }
                        },
                        error: function (response, status, errorThrown) {
                            btn.removeClass('disabled').prop('disabled', false);
                            btn.html('Fetch');
                            swal.fire(errorThrown, JSON.stringify(response.responseJSON, null, 2), 'error');
                        }
                    });
                } else {
                    swal.fire('Error!', 'Please enter imdb title to fetch information!', 'error');
                }
            });

            new Crud({
                columns: [
                    {title: 'POSTER', data: 'poster'},
                    {title: 'TITLE', data: 'title'},
                    {title: 'DESCRIPTION', data: 'description'},
                    {title: 'IMDB RATING', data: 'imdb_rating'},
                    {title: 'RELEASE DATE', data: 'release_date'},
                    {title: 'CONTENT RATING', data: 'content_rating'},
                    {title: 'META TITLE', data: 'meta_title'},
                    {title: 'META DESCRIPTION', data: 'meta_description'},
                    {title: 'META KEYWORDS', data: 'meta_keywords'},
                    {title: 'DOWNLOAD', data: 'download'},
                    {title: 'SUBTITLES', data: 'subtitles'},
                    {title: 'UPCOMING', data: 'upcoming'},
                    {title: 'PREMIUM', data: 'premium'},
                    {title: 'STATUS', data: 'status'},
                    {title: 'CREATED AT', data: 'created_at'},
                    {title: 'ACTIONS', data: 'actions'},
                ],
                routes: {
                    index: "{{ route('channel.movies.index') }}",
                    store: "{{ route('channel.movies.store') }}",
                },
                callbacks: {
                    read: function (response, modal) {
                        if (response.status) {
                            console.log(modal, response);

                            modal.find('.select-select2').empty();

                            // Genres
                            $.each(response.data.genres, (i, item) => {
                                const option = new Option(item.name, item.id, true, true);
                                modal.find('.select-select2.genres').append(option).trigger('change');
                            });

                            // Languages
                            $.each(response.data.languages, (i, item) => {
                                const option = new Option(item.title, item.id, true, true);
                                modal.find('.select-select2.languages').append(option).trigger('change');
                            });

                            modal.find('[name="title"]').val(response.data.movie.title);
                            modal.find('[name="description"]').val(response.data.movie.description);

                            // Actors
                            $.each(response.data.movie.actors, (i, item) => {
                                const option = new Option(item, item, true, true);
                                modal.find('.select-select2.actors').append(option).trigger('change');
                            });

                            // Directors
                            $.each(response.data.movie.directors, (i, item) => {
                                const option = new Option(item, item, true, true);
                                modal.find('.select-select2.directors').append(option).trigger('change');
                            });

                            modal.find('[name="imdb_rating"]').val(response.data.movie.imdb_rating);
                            modal.find('[name="content_rating"]').val(response.data.movie.content_rating);
                            modal.find('[name="release_date"]').val(response.data.movie.release_date);

                            modal.find('[name="meta_title"]').val(response.data.movie.meta_title);
                            modal.find('[name="meta_description"]').val(response.data.movie.meta_description);
                            modal.find('[name="meta_keywords"]').val(response.data.movie.meta_keywords);

                            // Poster
                            const poster = modal.find('[name="poster"]');
                            poster.val(response.data.media.poster.id);
                            poster.parent().find('.choose-media').next().text(response.data.media.poster.title);
                            poster.parent().find('.preview').html('<img class="img-thumbnail img-fluid mt-1" src="' + config.storage + response.data.media.poster.path + '">');

							// Trailer
							const trailer = modal.find('[name="trailer"]');
							trailer.val(response.data.media.trailer.id);
							trailer.parent().find('.choose-media').next().text(response.data.media.trailer.title);

							// Videos
                            $.each(response.data.media.videos, (i, video) => {
                                const item = modal.find('[name="videos[' + video.pivot.type + ']"]');

                                item.val(video.id);
                                item.parent().find('.choose-media').next().text(video.title);
                            });

                            // Subtitles
                            $.each(response.data.media.subtitles, (i, subtitle) => {
                                const item = modal.find('[name="subtitles_data['+i+']"]');

                                item.val(subtitle.id);
                                item.parent().find('.choose-media').next().text(subtitle.title);
                            });

                            modal.find('[name="download"]').prop('checked', response.data.movie.download);
                            modal.find('[name="subtitles"]').prop('checked', response.data.movie.subtitles);
                            modal.find('[name="upcoming"]').prop('checked', response.data.movie.upcoming);
                            modal.find('[name="premium"]').prop('checked', response.data.movie.premium);
                        }
                    },
                }
            });

            new ChooseMedia({
                routes: {
                    upload: '{{ route('channel.media.store') }}',
                    media: '{{ route('pagination.media') }}'
                }
            });
        });
	</script>
@endsection