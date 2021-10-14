<x-panel-layout>
    <x-slot name="title">
        - صفحه اطلاعات کاربری
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('profile') }}" class="is-active">اطلاعات کاربری</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="img/pro.jpg" class="avatar___img">
                        <input name="profile" type="file" accept="image/*" class="hidden avatar-img__input">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">{{ auth()->user()->name }}</span>
                </div>
                <input name="name" type="text" class="text" placeholder="نام کاربری" value="{{ auth()->user()->name }}">
                <input name="mobile" type="text" class="text" placeholder="شماره موبایل"
                       value="{{ auth()->user()->mobile }}">
                <input name="email" type="email" class="text text-wleft" placeholder="ایمیل"
                       value="{{ auth()->user()->email }}">
                <input name="password" type="password" class="text text-left" placeholder="رمز عبور">
                <p class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p>
                <br>
                <br>
                <button class="btn btn-webamooz_net">ذخیره تغییرات</button>
            </form>
        </div>
</x-panel-layout>
