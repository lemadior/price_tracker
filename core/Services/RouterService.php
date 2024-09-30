<?

namespace Core\Services;

class RouterService
{
    public function scrubPath(string $path): string
    {
        $isFullPath = str_contains($path, '\\');
        return $isFullPath
            ? substr($path, strrpos($path, '\\') + 1)
            : $path;
    }

    public function getControllerPath(string $path): string
    {
        $isFullPath = str_contains($path, '\\');

        return $isFullPath
            ? $path
            : "App\\Controllers\\{$path}";
    }
}
