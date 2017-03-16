import java.util.*; 
import java.io.*;
public class backup{
	public static void main (String[] args) throws IOException {
		String fileName;
		Scanner sc = new Scanner(System.in);  
		if (args.length < 1) {
			System.out.print("Enter the file name: ");
			fileName = sc.nextLine(); 
		} else {
			for (int i = 0; i < args.length; i++) {
				fileName = args[i]; 
				String fn = fileName.split("[^A-Za-z0-9.]")[fileName.split("[^A-Za-z0-9.]").length - 1];
				File dir = new File("C:/Users/Anthony/Dropbox/backups/"+fn+"/");
				if (!dir.exists()) {
					dir.mkdir(); 
				}
				File inputFile = new File(fileName); 
				String newFileName = new Date().getTime()+fn; 
				File outputFile = new File("C:/Users/Anthony/Dropbox/backups/"+fn+"/"+new Date().getTime()+"."+fn);
				File outputInformation = new File("C:/Users/Anthony/Dropbox/backups/"+fn+"/"+new Date().getTime()+"."+fn+".info.txt");
				InputStream input = new FileInputStream(inputFile);
				OutputStream output = new FileOutputStream(outputFile);
				OutputStream information = new FileOutputStream(outputInformation);
				byte[] buffer = new byte[1024];
				int bytesRead;
				while ((bytesRead = input.read(buffer)) > 0){
					output.write(buffer, 0, bytesRead);
				}
				System.out.println("backup information: ");
				String info = sc.nextLine(); 
				information.write(info.getBytes());
				input.close(); 
				information.close();
				output.close();
			}
		}
	}
}