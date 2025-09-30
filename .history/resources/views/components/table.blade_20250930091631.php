@props([
  'headers' => [],
  'rows' => [],
  'empty' => 'Tidak ada data'
])

<div class="table-responsive">
  <table class="table align-middle table-hover">
    <thead class="table-light">
      <tr>
        @foreach($headers as $h)
          <th scope="col">{{ $h['label'] }}</th>
        @endforeach
        <th scope="col" class="text-end">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($rows as $row)
        <tr>
          @foreach($headers as $h)
            <td>{{ data_get($row, $h['key']) }}</td>
          @endforeach
          <td class="text-end">
            <a href="#" class="btn btn-sm btn-outline-secondary disabled">Detail</a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="{{ count($headers)+1 }}" class="text-center text-muted">{{ $empty }}</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

@if(method_exists($rows,'links'))
  <div class="mt-3">{{ $rows->links() }}</div>
@endif
