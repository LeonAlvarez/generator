<?php

namespace Kodeloper\Generator\Generators;

use Illuminate\Support\Carbon;


class RoutesGenerator extends BaseGenerator
{
    /**
     * Get the routes stub file path for the generator.
     *
     * @param String $type @default ''
     *
     * @return string
     */
    protected function getStubFilePath(String $type = '')
    {
        return config('generator.custom_stubs')
            ? config('generator.custom_stubs.path') . '/'. $type . 'Routes.stub'
            : __DIR__ . '/../Stubs/'. $type . 'Routes.stub';
    }

    public function fromSchema(array $data)
    {
        $this->schema = $this->getSchema()[$data['model']];
        $this->data = $data;
        $this->data['class_name'] = $this->data['model'];
        $this->data['resource'] = $this->data['table'];

        $this->generateApiRoutes();

        return $this->stub;
    }

    private function generateApiRoutes()
    {
        $this->config = $this->getPackageConfig()['api'];

        $this->stub = file_get_contents($this->getStubFilePath('Api'));
        $this->replaceApiVersion()
            ->replaceResource()
            ->replaceModelBinding()
            ->replaceController();

        $this->generateFile($this->config['routes']['path'], $this->config['routes']['file'] , ['override' => true, 'merge' => true]);

        return $this->stub;
    }

    private function replaceApiVersion()
    {
        $this->stub = $stub = str_replace('{{ApiVersion}}', $this->config['version'], $this->stub);
        return $this;
    }

    private function replaceResource()
    {
        $this->stub = $stub = str_replace('{{Resource}}', $this->data['resource'] , $this->stub);
        return $this;
    }

    private function replaceModelBinding()
    {
        $this->stub = $stub = str_replace('{{ModelBinding}}', strtolower($this->data['model']) , $this->stub);
        return $this;
    }

    private function replaceController()
    {
        $controllerNamespace = str_replace('App\\Http\\Controllers\\', '', $this->config['controllers']['namespace']);
        $controller = $controllerNamespace != '' ?
            $controllerNamespace . '\\' . $this->data['model'] . 'Controller'
            : $this->data['model'] . 'Controller';

        $this->stub = $stub = str_replace('{{Controller}}', $controller , $this->stub);
        return $this;
    }
}
