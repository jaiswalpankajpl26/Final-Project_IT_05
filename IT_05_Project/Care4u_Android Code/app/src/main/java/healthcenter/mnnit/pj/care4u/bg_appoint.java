package healthcenter.mnnit.pj.care4u;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by SULAV KUMAR SAHA on 11-03-2016.
 */
public class bg_appoint extends AsyncTask<String,Void,String> {


    String dated;
    //private Dialog loadingDialog;
    String login_url="";
    String id;
    String dname;
    String dtime,special;
    public Context ctx2;
    private ProgressDialog dialog;
    public bg_appoint(display_chart activity,Context ctx2) {
        dialog = new ProgressDialog(activity);
        this.ctx2=ctx2;
    }
    //public bg_appoint(Context ctx2){
    //  this.ctx2=ctx2;
    // dialog =new ProgressDialog(ctx2);
    //}+

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        dialog.setMessage("Loading, please wait...");
        dialog.show();
    }

    @Override
    protected String doInBackground(String... params) {
       login_url = "http://hc.mnnit.ac.in/care4u/appoint.php";
        //login_url = "http://210.212.49.25/care4u/appoint.php";
        id = params[0];
        dated = params[1];
        dname=params[2];
        dtime=params[3];
        special=params[4];
        try {
            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setReadTimeout(15000);
            httpURLConnection.setConnectTimeout(1500);

            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
            String data = URLEncoder.encode("id", "UTF-8") + "=" + URLEncoder.encode(id, "UTF-8") + "&" +
                    URLEncoder.encode("sel_date", "UTF-8") + "=" + URLEncoder.encode(dated, "UTF-8");
            bufferedWriter.write(data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream, "iso-8859-1"));
            //String response = "";
            String line;
            StringBuilder res = new StringBuilder();
            while ((line = bufferedReader.readLine()) != null) {
                res.append(line + "\n");
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return res.toString().trim();
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);


    }

    @Override
    protected void onPostExecute(String result) {
        // loadingDialog.dismiss();
//       result="true";

     /*  Intent intent = new Intent(ctx2,appoint.class);
        intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
        intent.putExtra("t_id", result);
        intent.putExtra("sel_date",dated);
       ctx2.startActivity(intent);*/
        //  Toast.makeText(ctx2,result,Toast.LENGTH_LONG).show();
        // loadingDialog.dismiss();
        if (dialog.isShowing()) {
            dialog.dismiss();
        }

        if (result.matches("true")) {
            Toast.makeText(ctx2, "Doctor on leave", Toast.LENGTH_LONG).show();
        }
        else if (result.matches("false")){
            Intent intent = new Intent(ctx2, appoint.class);
            intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
            intent.putExtra("dname",dname);
            intent.putExtra("sel_date", dated);
            intent.putExtra("dtime",dtime);
            intent.putExtra("special",special);
            ctx2.startActivity(intent);
        }
        else{
            Toast.makeText(ctx2, "Server Error", Toast.LENGTH_LONG).show();
        }
    }
}
