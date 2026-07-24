import os

ROOT_DIR = "/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms"

def search_and_replace():
    for root, dirs, files in os.walk(ROOT_DIR):
        if any(ignored in root for ignored in ['.git', '.agents', '.cmsplan', 'node_modules']):
            continue
        for name in files:
            if not name.endswith(('.php', '.js', '.css', '.html', '.txt', '.json', '.md', '.sql', '.scss')):
                continue
            
            if name == 'rebrand.py':
                continue
            
            filepath = os.path.join(root, name)
            try:
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()
            except UnicodeDecodeError:
                continue
                
            new_content = content
            new_content = new_content.replace('wp-', 'zc-')
            new_content = new_content.replace('wp_', 'zc_')
            new_content = new_content.replace('WP_', 'ZC_')
            new_content = new_content.replace('WP-', 'ZC-')
            new_content = new_content.replace('WordPress', 'ZelocoreCMS')
            new_content = new_content.replace('Wordpress', 'ZelocoreCMS')
            new_content = new_content.replace('wordpress', 'zelocorecms')
            new_content = new_content.replace('WPMU_', 'ZCMU_')
            new_content = new_content.replace('wpmu_', 'zcmu_')
            new_content = new_content.replace('WORDPRESS', 'ZELOCORECMS')
            
            if new_content != content:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)

def rename_files_and_folders():
    for root, dirs, files in os.walk(ROOT_DIR, topdown=False):
        if any(ignored in root for ignored in ['.git', '.agents', '.cmsplan', 'node_modules']):
            continue
        for name in dirs:
            if 'wp-' in name or 'wp_' in name:
                new_name = name.replace('wp-', 'zc-').replace('wp_', 'zc_')
                os.rename(os.path.join(root, name), os.path.join(root, new_name))
                
        for name in files:
            if name == 'rebrand.py':
                continue
            if 'wp-' in name or 'wp_' in name:
                new_name = name.replace('wp-', 'zc-').replace('wp_', 'zc_')
                os.rename(os.path.join(root, name), os.path.join(root, new_name))

if __name__ == '__main__':
    search_and_replace()
    rename_files_and_folders()
    print("Rebranding complete.")
