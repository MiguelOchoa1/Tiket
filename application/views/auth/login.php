<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    html, body {
        background: linear-gradient(135deg, #141423 0%, #0f0f1b 100%) !important;
        color: #ceced8 !important;
        height: 100% !important;
        width: 100% !important;
        overflow: hidden !important;
        font-family: Poppins, sans-serif !important;
    }
    
    .page {
        background: linear-gradient(135deg, #141423 0%, #0f0f1b 100%) !important;
        height: 100vh !important;
        width: 100vw !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .page::before {
        display: none !important;
    }
    
    .page.login-page {
        background: linear-gradient(135deg, #141423 0%, #0f0f1b 100%) !important;
    }
    
    .login-page::before {
        display: none !important;
    }
    
    .login-card {
        background: #ceced8 !important;
        border-radius: 15px !important;
        padding: 50px 40px !important;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3) !important;
        width: 100% !important;
        max-width: 500px !important;
    }
    
    .login-header {
        text-align: center !important;
        margin-bottom: 40px !important;
    }
    
    .login-header h1 {
        color: #141423 !important;
        font-size: 28px !important;
        font-weight: 700 !important;
        margin: 0 0 10px 0 !important;
        letter-spacing: -0.5px !important;
    }
    
    .login-header p {
        color: #0f0f1b !important;
        font-size: 16px !important;
        font-weight: 500 !important;
        margin: 0 !important;
    }
    
    .login-divider {
        height: 3px !important;
        width: 60px !important;
        background: #141423 !important;
        margin: 20px auto 0 !important;
    }
    
    .login-form-group {
        margin-bottom: 25px !important;
    }
    
    .login-form-group:last-of-type {
        margin-bottom: 30px !important;
    }
    
    .login-label {
        display: block !important;
        color: #0f0f1b !important;
        font-weight: 600 !important;
        margin-bottom: 8px !important;
        font-size: 14px !important;
    }
    
    .login-input {
        width: 100% !important;
        padding: 12px 15px !important;
        border: 2px solid #141423 !important;
        border-radius: 8px !important;
        font-size: 16px !important;
        box-sizing: border-box !important;
        transition: all 0.3s ease !important;
        background: #fff !important;
        color: #0f0f1b !important;
    }
    
    .login-input:focus {
        border-color: #0f0f1b !important;
        box-shadow: 0 0 0 3px rgba(20,20,35,0.1) !important;
        outline: none !important;
    }
    
    .login-btn {
        width: 100% !important;
        padding: 13px !important;
        background: linear-gradient(135deg, #141423 0%, #0f0f1b 100%) !important;
        color: #ceced8 !important;
        border: none !important;
        border-radius: 8px !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
    }
    
    .login-btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 10px 25px rgba(20,20,35,0.3) !important;
    }
    
    .login-btn:active {
        transform: translateY(0) !important;
    }
    
    .login-messages {
        margin-top: 20px !important;
        color: #0f0f1b !important;
    }
    
    .login-footer {
        text-align: center !important;
        margin-top: 30px !important;
        position: absolute !important;
        bottom: 20px !important;
        width: 100% !important;
        left: 0 !important;
    }
    
    .login-footer p {
        color: #ceced8 !important;
        font-size: 13px !important;
        opacity: 0.8 !important;
        margin: 0 !important;
    }
</style>

<div class="page login-page">
    <div style="width: 100%; max-width: 500px;">
        <!-- Login Card -->
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <h1>USPHARMALTD</h1>
                <p>HELPDESK</p>
                <div class="login-divider"></div>
            </div>

            <!-- Form -->
            <form method="post" class="form-validate" action="">
                <!-- Username Input -->
                <div class="login-form-group">
                    <label for="login-username" class="login-label">User Name</label>
                    <input id="login-username" type="text" name="username" required 
                           class="login-input input-material"
                           data-msg="Please enter your username">
                </div>

                <!-- Password Input -->
                <div class="login-form-group">
                    <label for="login-password" class="login-label">Password</label>
                    <input id="login-password" type="password" name="password" required 
                           class="login-input input-material"
                           data-msg="Please enter your password">
                </div>

                <!-- Login Button -->
                <button type="submit" id="login" class="login-btn">
                    Login
                </button>
            </form>

            <!-- Messages -->
            <div class="login-messages">
                <?= get_msg(); ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="login-footer">
            <p>© 2025 USPHARMALTD | All rights reserved</p>
        </div>
    </div>
</div>
