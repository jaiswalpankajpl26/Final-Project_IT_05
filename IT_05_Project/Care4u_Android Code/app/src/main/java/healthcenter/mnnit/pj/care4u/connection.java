package healthcenter.mnnit.pj.care4u;


import android.annotation.TargetApi;
import android.app.AlertDialog;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Build;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

/**
 * Created by lenovo on 3/7/16.
 */
@TargetApi(Build.VERSION_CODES.CUPCAKE)

public class connection extends AsyncTask<Void,String,String> {

    protected ProgressDialog progressDialog;

    AlertDialog alertDialog;
    private Dialog loadingDialog;
    Context ctx;
    public AsyncResponse delegate = null;

    public connection(Context ctx)
    {
        this.ctx=ctx;
    }


    @Override
    protected void onPreExecute() {
       /* alertDialog = new AlertDialog.Builder(ctx).create();
        alertDialog.setTitle("Login Information....");
*/
        //      super.onPreExecute();
        progressDialog = new ProgressDialog(ctx);
        progressDialog.setMessage("Loading .... Please Wait");
        progressDialog.show();
        /*loadingDialog= ProgressDialog.show(ctx, "Please wait", "loading....");
		 final Timer t = new Timer();
        t.schedule(new TimerTask() {
            public void run() {
                loadingDialog.dismiss();
                t.cancel();
            }
        }, 2000);
*/

    }
    @Override
    protected String doInBackground(Void... params) {
        //String requestURL = "http://hc.mnnit.ac.in/care4u/connect.php";
        String requestURL = "http://172.31.101.223/newhc/care4u/connect.php";

        URL url;
        String response = "";
        try {
            url = new URL(requestURL);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setReadTimeout(15000);
            conn.setConnectTimeout(15000);
            conn.setRequestMethod("POST");
            conn.setDoInput(true);
            conn.setDoOutput(true);
            InputStream inputStream = conn.getInputStream();

            //The input and output streams returned by this class are not buffered.
            // Most callers should wrap the returned streams with BufferedInputStream or BufferedOutputStream.
            // Callers that do only bulk reads or writes may omit buffering.

//            Toast.makeText(ctx,"lo",Toast.LENGTH_LONG).show();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

            String line = "";
            while((line = bufferedReader.readLine())!=null)
            {
                response+= line;

            }

            bufferedReader.close();
            inputStream.close();
            conn.disconnect();




        } catch (MalformedURLException e){
            System.out.print(e);
        } catch (IOException e) {
            System.out.print(e);
        }

        return response;

    }
    @Override
    protected void onPostExecute(String result)
    {
        progressDialog.dismiss();

        delegate.processFinish(result);




    }
}
