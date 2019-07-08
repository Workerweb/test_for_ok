<?phpinfo()



namespace App;


class TaskFilter
{
	protected $builder;
	protected $request;


	public function __construct($builder, $request)
	{
		$this->builder = $builder;
		$this->request = $request;
	}

	public function apply()
	{
		foreach ($$this->filters() as $filter => $value) {
			if(method_exists($this, $filter)) {
				$this->$filter($value);
			}
		}
		return $this->builder;
	}

	public function from($value)
	{
		if (!$value) return;

		$this->builder->where('from', 'like', "%$value%");
	}

	public function to($value)
	{
		if (!$value) return;

		$this->builder->where('to', 'like', "%$value%");
	}

	public function title($value)
	{
		if (!$value) return;

		$this->builder->where('title', 'like', "%$value%");
	}

	public function status($value)
	{
		if (!$value) return;

		$this->builder->where('Status', $value);
	}

	public function deadline($value)
	{
		if (!$value) return;

		$this->builder->where('deadline', '=', $value);
	}

	public function filters()
	{
		return $this->request->all();
	}
}