

<div id="smart-button-container">
  <div style="text-align: center;">
    <form action="{{ route('order') }}" method="post">
      @csrf
      <button type="submit" class="btn btn-success">{{get_phrase('Pay')}} </button>
      <input type="hidden" name="identifier" value="zarinpal">
    </form>
  </div>
</div>