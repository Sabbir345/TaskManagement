<template>
  <div class="container">
    <br><br>
    
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <button class="btn btn-success btn-sm" @click="addTask()">
               <i class="fa fa-plus" aria-hidden="true"></i> Task
          </button>
        </div>
        <div class="col-md-8">
            <div class="row">
              <input type="text" v-model="search"  class="form-control search-box-size" placeholder="Example : Task Name" @keyup.enter="handleSearch()">
              <button class="btn btn-primary" @click="handleSearch()">Search</button>
            </div>
        </div>
      </div>
    </div>
    <br>
    <div class="col-md-12">
         <table class="table table-bordered">
            <thead>
              <tr>
                <th width="3%">#</th>
                <th width="30%">Task Name</th>
                <th width="52%">Description</th>
                <th width="2%">Task</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item , index) in tasklist">
                <td>1</td>
                <td>{{ item.task_name }}</td>
                <td>{{ item.description }}</td>
                <td>
                  <span v-if="item.is_complete == 1">Complete</span>
                  <span v-if="item.is_complete == 0">Not complete</span>
                </td>
                <td>
                  <button class="btn btn-primary btn-sm" @click="handleEdit(item.id)">Edit</button>
                  <button class="btn btn-danger btn-sm" @click="handleDelete(item.id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>

     <div id="addTask" class="modal fade custom-modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content modal-width">
              <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body text-left">
                  <div class="form-group">
                    <label for="task_name">Task Name</label>
                    <input type="text" class="form-control" id="task_name"  placeholder="Task Name" v-model="addTaskData.task_name">
                  </div>
                  <div class="form-group">
                    <label for="description">Task Description</label>
                    <textarea v-model="addTaskData.description" 
                    class="form-control" placeholder="Task Description">
                      
                    </textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button  class="btn btn-default btn-sm" data-dismiss="modal">
                  <i class="fa fa-times" aria-hidden="true"></i> Close
                </button>
                <button  class="btn btn-success btn-sm" @click="handleTaskadd()">
                  <i class="fa fa-paper-plane"></i> Submit
                </button>
              </div>
            </div>

          </div>
        </div> 

        <div id="taskEdit" class="modal fade custom-modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content modal-width">
              <div class="modal-header">
                <h4 class="modal-title">Edit Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body text-left">
                  <div class="form-group">
                    <label for="task_name">Task Name</label>
                    <input type="text" class="form-control" id="task_name"  placeholder="Task Name" v-model="editTask.task_name">
                  </div>
                  <div class="form-group">
                    <label for="description">Task Description</label>
                    <textarea v-model="editTask.description" 
                    class="form-control" placeholder="Task Description">
                      
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="is_complete">Is Complete ?</label><br>
                    <input type="radio" v-model="editTask.is_complete" value="1"> Yes<br>
                    <input type="radio" v-model="editTask.is_complete" value="0"> No
                    
                  </div>
              </div>
              <div class="modal-footer">
                <button  class="btn btn-default btn-sm" data-dismiss="modal">
                  <i class="fa fa-times" aria-hidden="true"></i> Close
                </button>
                <button  class="btn btn-success btn-sm" @click="handleUpdate(editTask.id)">
                  <i class="fa fa-paper-plane"></i> Update
                </button>
              </div>
            </div>

          </div>
        </div>

      <el-pagination
                background
                class="fix"
                @current-change="handleCurrentChange"
                    :page-size="perPage"
                    layout="total, prev, pager, next"
                    :total="totalData">
            </el-pagination>

            <br><br>
  </div>
</template>

<script>
  
  export default {

    data () {

      return {
                submitted: false,
                picked:'',
                tasklist:[],
                search:'',
                perPage: 20,
                totalData: 0,
                statusReport:[],
                indexValueForPagination: 0,
                addTaskData:{
                   task_name:'',
                   description:'',
                },
                editTask:{}
            }
          },
          watch:{
             search() {
                if (this.search.length == 0) {
                  this.tableData();
                }
              }
          },
          mounted () {
              this.tableData();    
          },
       
          methods:{

            pleaseWaitLoading() {
                 const loading = this.$loading({
                     lock: true,
                     text: 'Please Wait',
                     spinner: 'el-icon-loading',
                     background: 'rgba(0, 0, 0, 0.7)'
                 });
            },
            addTask(){
              $('#addTask').modal('show');
            },
            handleTaskadd(){
               $('#addTask').modal('hide');
               axios.post('/admin/taskadd',this.addTaskData)
                .then((response) => {
                  this.tableData();
                  
                })
                .catch((error) => {
                  
                })
            },
            handleCurrentChange(next) {
              this.indexValueForPagination = 0;
              if (next == 1) return this.tableData(next);

              this.indexValueForPagination = ((next + this.indexValueForPagination) * this.perPage) - this.perPage;
              this.TableData(next);
            },
            tableData(nextPage = null) {
              let url = `/admin/alltasks?per_page=${this.perPage}`;

              if (nextPage) {
                url += `&page=${nextPage}`;
              }

              if (this.search.length) {
                url += `&search=${this.search}`;
              }

              axios.get(url)
              .then((response) => {
                this.tasklist = response.data.tasks.data;
                this.totalData = response.data.tasks.total;
              })
              .catch((error) => {

              })
           },
           taskUpdate(id){

           },
          handleDelete(id){
          this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
              confirmButtonText: 'OK',
              cancelButtonText: 'Cancel',
              type: 'warning',
              center: true
            }).then(() => {
              axios.delete('/admin/task-delete/'+ id)
              this.$message({
                type: 'success',
                message: 'Delete completed'
              });
              this.tableData();
            }).catch(() => {
              this.$message({
                type: 'info',
                message: 'Delete canceled'
              });
            });
       },
       handleSearch() {
          if (this.search.length > 2 || this.search.length == 0) {
          this.tableData();
        } else {
          this.$toast.error({
              title:'Notification',
              message:'The Search Length minimum more then 2 allowed'
          })
        }
       },
       handleEdit(id){
         axios.get('/admin/task-edit/'+id)
          .then((response) => {
            this.editTask = response.data.task;
            
          })
          .catch((error) => {
            
          })

          $('#taskEdit').modal('show');
       },
       handleUpdate(id){
         $('#taskEdit').modal('hide');

         axios.post('/admin/task-update/'+id , this.editTask)
          .then((response) => {
            this.tableData()
          })
          .catch((error) => {
            
          })

          
       }
            
          }
       }

</script>






<style>


</style>