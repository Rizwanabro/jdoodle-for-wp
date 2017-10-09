If($args.Count -eq 0) {
    Write-Output "Enter the archive version."
    Exit
}

Remove-Item "..\release" -Recurse -ErrorAction Ignore -Force
mkdir "..\Release"
Copy-Item -Destination "..\Release\" -Recurse ".\"
chdir "..\Release\jdoodle-for-wp"
Remove-Item ".\.git" -Recurse -ErrorAction Ignore -Force
Remove-Item ".\.gitignore"
Remove-Item ".\publish.ps1"
Remove-Item ".\README.md"
Remove-Item ".\update.bat"
chdir ".."
$filename = "..\jdoodle-for-wp-" + $args[0] + ".zip"
Compress-Archive -Path ".\jdoodle-for-wp" -DestinationPath $filename
chdir "..\jdoodle-for-wp"
Remove-Item "..\release" -Recurse -ErrorAction Ignore -Force




