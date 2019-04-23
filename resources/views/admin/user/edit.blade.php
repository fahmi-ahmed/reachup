@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.user.actions.edit', ['name' => $user->name]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <user-form
                :action="'{{ $user->resource_url }}'"
                :data="{{ $user->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.user.actions.edit', ['name' => $user->name]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.user.components.form-elements')

                    </div>

                    <div class="card-body">

                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\User::class)->getMediaCollection('user_img'),
                            'media' => $user->getThumbs200ForCollection('user_img'),
                            'label' => 'User_image'
                        ])

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </user-form>

    </div>

</div>

@endsection