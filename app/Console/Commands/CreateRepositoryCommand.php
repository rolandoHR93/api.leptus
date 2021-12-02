<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repository:composer {composer}';


    protected $files;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a file PHP Repository composer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        $this->files=$files;
        parent::__construct();
    }

    /**
     * Execute the console command.
     * ☼•⁞⁞∞™©Ωπβαµ∞
     * @return int
     */
    public function handle()
    {
        $viewComposer=$this->argument('composer');

        if ($viewComposer === '' || is_null($viewComposer) || empty($viewComposer)) {
            return $this->error('Composer Name Invalid..!');
        }

        $viewComposer = $viewComposer.'Repository';

        $contents= $this->generateContentFileRepository($viewComposer);

        if ($this->confirm('Do you wish to create '.$viewComposer.' Composer file?')) {
            $file = "${viewComposer}.php";
            $path=app_path();

            $file=$path."/Repositories/$file";
            $composerDir=$path."/Repositories";

            if($this->files->isDirectory($composerDir)){
                if($this->files->isFile($file))
                    return $this->error($viewComposer.'X - File Already exists!');

                if(!$this->files->put($file, $contents))
                    return $this->error('X - Something went wrong!');
                $this->info("•••• $viewComposer generated √√√√");
            }
            else{
                $this->files->makeDirectory($composerDir, 0777, true, true);

                if(!$this->files->put($file, $contents))
                    return $this->error('X - Something went wrong!');
                $this->info("•••• $viewComposer generated √√√√");
            }

        }
    }

    private function generateContentFileRepository(string $viewComposer):string{
        $contents=
            '<?php
namespace App\Repositories;

use App\Models\User;
use stdClass;
use DB;

class '.$viewComposer.'
{
    /**
    * Create a new '.$viewComposer.' composer.
    * now implements NameInterface
    * @return void
    */

}';
        return $contents;
    }
}
