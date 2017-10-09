Remove-Item "..\release" -Recurse -ErrorAction Ignore -Force
mkdir "..\Release"
Copy-Item -Destination "..\Release\" -Recurse ".\"
chdir "..\Release"
# Remove-Item ".\.git" -Recurse -ErrorAction Ignore -Force


# Set-Location "..\jdoodle-for-wp"



