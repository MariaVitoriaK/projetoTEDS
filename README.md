```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=ProjetoTEDS
DB_USERNAME=root
DB_PASSWORD=

```

```
protect $fillable = [
    'disiplina_id', 'titulo', 'descricao', 'created_by',
];

protected $table = 'avalicoes';

public function disiplina()
{
    return $this->belongsTo(Disciplina::class);
}

public function autor()
{
    return $this->belongsTo(User::class, 'created_by')


}
```
