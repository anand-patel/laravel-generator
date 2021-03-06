<?php

namespace InfyOm\Generator\Commands\Scaffold;

use Illuminate\Support\Composer;
use InfyOm\Generator\Common\CommandData;
use InfyOm\Generator\Generators\Scaffold\ControllerGenerator;

class ControllerGeneratorCommand extends ScaffoldBaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom.scaffold:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create controller command';

    /**
     * Create a new command instance.
     * @param Composer $composer
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();

        $this->composer = $composer;
        $this->commandData = new CommandData($this, CommandData::$COMMAND_TYPE_SCAFFOLD);
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        $this->initScaffoldGeneratorCommandData();

        $controllerGenerator = new ControllerGenerator($this->commandData);
        $controllerGenerator->generate();

        $this->performPostActions();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), []);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(), []);
    }
}
