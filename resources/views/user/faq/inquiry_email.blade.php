@php
    if($userInfo['language'] == config('constants.language_japanese'))
    {
        $system = $faqArticle->category->top_category_ja_name;
        $category = $faqArticle->category->sub_category_ja_name;
        $subject = $form->subject_ja;
    }
    else
    {
        $system = $faqArticle->category->top_category_en_name;
        $category = $faqArticle->category->sub_category_en_name;
        $subject = $form->subject_en;
    }
@endphp

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Inquiry Email</title>
  <style>

    tr td:first-child {
        font-weight: bold;
        width: 200px;
    }

    th{
        font-size: 18px;
    }
    
    p{
        padding:10px;
        font-weight: bold;
        background: rgb(0, 168, 169);
        color: white;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    table, th, td {
      border: 1px solid #cccccc;
      text-align: left;
    }

    tr:nth-child(odd) {
      background-color: #f2f2f2; 
    }

    .heading{
        background: rgb(0, 168, 169) !important;
        color: #ffffff;
    }
</style>
</head>
<body>
    <p class="text-muted faq-list pt-0">
        {{ __('faq_no') }} {{ $faqArticle->faq_id }} 
        <a href="#" class="link">{{ $faqArticle->title }}</a>
    </p>
  <table border="0" cellpadding="10">
    <tr class="heading">
      <th colspan="2">{{ __('user_information') }}</th>
    </tr>
    <tr>
      <td>{{ $isKubotaUser ? __('guid') : __('id') }}</td>
      <td>{{ $userInfo['guid'] }}</td>
    </tr>
    <tr>
      <td>{{ $isKubotaUser ? __('employee_name') :  __('name')}}</td>
      <td>{{ getUsername() }}</td>
    </tr>
    <tr>
      <td>{{ $isKubotaUser ? __('affiliation') :  __('company')}}</td>
      <td>{{ $formData['affiliation'] }}</td>
    </tr>
    <tr>
      <td>{{ __('language') }}</td>
      <td>{{ $userInfo['language'] == config('constants.language_japanese') ? '日本語' : 'English' }}</td>
    </tr>
    <tr>
      <td>{{ __('email_address') }}</td>
      <td>{{ $formData['email'] }}</td>
    </tr>
    <tr>
      <td>{{ __('phone_number') }}</td>
      <td>{{ $formData['phone'] }}</td>
    </tr>
    <tr class="heading">
        <th colspan="2">{{ __('inquiry_details') }}</th>
    </tr>
    <tr>
        <td>{{ __('system') }}</td>
        <td>{{ $system }}</td>
    </tr>
    <tr>
        <td>{{ __('category') }}</td>
        <td>{{ $category }}</td>
    </tr>
    <tr>
        <td>{{ __('subject') }}</td>
        <td>{{ $subject }}</td>
    </tr>
    @foreach ($form->formItems as $formItem)
        @php
            $nameSlug = 'inq_' . Str::slug($formItem->item_name_en, '_');
        @endphp
    <tr>
        <td>{{ $userInfo['language'] == config('constants.language_japanese') ? $formItem->item_name_ja : $formItem->item_name_en }}</td>
        <td>{{ $formData[$nameSlug] }}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>
