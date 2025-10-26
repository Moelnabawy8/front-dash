  @php
      $locale = LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar';
  @endphp
  <a class="nav-link text-muted my-2" href="{{ LaravelLocalization::getLocalizedURL($locale) }}" id="langSwitcher"
      data-mode="light">
      {{ strtoupper($locale) }}
  </a>
